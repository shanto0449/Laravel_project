<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminFavoriteController extends Controller
{
    public function index(){
        $posts = Auth::user()->favorite_posts;
        return view('admin.favorite',compact('posts'));

    }
}
