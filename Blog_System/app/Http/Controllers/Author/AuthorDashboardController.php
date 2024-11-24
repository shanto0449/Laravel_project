<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Str;
use Illuminate\Http\Request;

class AuthorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;
        $popular_posts = $user->posts()
        ->withCount('comments')
        ->withCount('favorite_to_users')
        ->orderBy('view_count','desc')
        ->orderBy('comments_count')
        ->orderBy('favorite_to_users_count')
        ->take(5)->get();
        // return view('author.dashboard');
        $total_pending_posts = $posts->where('is_approved',false)->count();
        $all_views = $posts->sum('view_count');
        return view('author.dashboard',compact('posts','popular_posts','total_pending_posts','all_views'));
    }
}
