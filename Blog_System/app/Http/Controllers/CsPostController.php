<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Session;

class CsPostController extends Controller
{

    public function index(){
        $posts = Post::latest()->approved()->published()->paginate(6);
        return view('posts',compact('posts'));
    }

    public function details($slug){
        $post = Post::where('slug',$slug)->approved()->published()->first();
      $bloogKey='blog_'.$post->id;
      if(!Session::has($bloogKey)){
        $post->increment('view_count');
        Session::put($bloogKey,1);
      }
      $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
      return view('post',compact('post','randomposts'));
    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }

    public function postByTag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }

}
