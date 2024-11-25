<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\Console\Command\Command;
use Brian2694\Toastr\Facades\Toastr;

class CommentsController extends Controller
{
    public function store(Request $request,$post){
        // dd($request);
        $validatedData = $request->validate([
            'comment'=>'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        Toastr::success('Comment Successfully Published','Success');
        return redirect()->back();
    }
}
