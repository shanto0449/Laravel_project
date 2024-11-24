<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class CsAuthorControler extends Controller
{
    public function profile($username){
      $author = User::where('username',$username)->first();
      $posts = $author->posts()->approved()->Published()->get();
      return view('profile',compact('author','posts'));
    }
}
