<?php

namespace App\Http\Controllers\Author;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorFavoriteController extends Controller
{
    public function index(){
        $posts = Auth::user()->favorite_posts;
        return view('author.favorite',compact('posts'));
    }
}
