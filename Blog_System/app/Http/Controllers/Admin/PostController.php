<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Notifications\AuthorPostApproved;
use Auth;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Carbon\Carbon;
use Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
            'categories'=>'required',
            'tags'=>'required',

            'body' => 'required',

        ]);


        $image = $request->file('image');
        $slug = str::slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            $image->move('post/', $imagename);

            $imgManager = new ImageManager(new Driver());

            $category = $imgManager->read('post/' . $imagename);
            $category->resize(1600, 1066)->save(public_path('storage/post/' . $imagename));
        } else {
            $imagename = "default.png";
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;

        $post->save();

        $post->categories()->attach($request->categories);

        $post->tags()->attach($request->tags);


        Toastr::success('Post Successfully Saved :)', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        // $postCategoryIds = $post->categories->pluck('id')->all();


        // dd($postCategoryIds);

        // dd($post->categories);
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg|max:2048',
            'categories'=>'required',
            'tags'=>'required',

            'body' => 'required',

        ]);


        $image = $request->file('image');
        $slug = str::slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            if(Storage::disk('public')->exists('post/'.$post->image)){
                Storage::disk('public')->delete('post/'.$post->image);
            }


            $image->move('post/', $imagename);

            $imgManager = new ImageManager(new Driver());

            $category = $imgManager->read('post/' . $imagename);
            $category->resize(1600, 1066)->save(public_path('storage/post/' . $imagename));
        } else {
            $imagename = $post-> image;
        }


        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->sync($request->categories);

        $post->tags()->sync($request->tags);


        Toastr::success('Post Successfully Updated :', 'Success');
        return redirect()->route('admin.post.index');
    }


    public function pending(){
        $posts = Post::where('is_approved',false)->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approve($id){
        $post = Post::findOrFail($id);
        if( $post -> is_approved = true){

            $post ->save();

            // $post->user->notify(new AuthorPostApproved($post));

        //    $post->user->notify(new AuthorPostApproved($post));
            Toastr::success('Post Successfully Approved','success');
        }else{
            Toastr::info('This Post is already Approved','Info');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(Storage::disk()->exists('post/'.$post->image));{
            Storage::disk('public')->delete('post/'.$post->image);
        }

        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('post Successfully Deleted','Success');
        return redirect()->back();
    }
}
