<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use  App\Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AuthorCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();

        return view('author.comments',compact('comments'));
    }

    public function destory($id){
       $coment = Comment::findOrFail($id)->delete
       ();
       Toastr::success('Comment Successfully Deleted','Success');
        return redirect()->back();

    }
}
