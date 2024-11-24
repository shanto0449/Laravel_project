<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::latest()->approved()->published()->take(6)->get();
        return view('welcome',compact('categories','posts'));
    }
}
