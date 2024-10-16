<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    function addBlog(Request $request){
        $request->validate([
            'title'=>'required | min:10|max:80',
            'description'=>'nullable | min:100 | max:250',
            'image'=>'required|max:1024|mimes:jpeg,jpg,png,gif'

        ]);

        $blog= new Blog();
        // $blog->sl = $request -> sl;
        $blog->title = $request -> title;
        $blog->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $blog->description = $request -> description;
        $blog->save();
        if($blog){
            return redirect('list');
        }else{
            return "Blog not submit";
        }


    }

    function list(){
        $blogData=Blog::latest()->paginate(5);
        return view('blog-list',['blogs'=>$blogData]);
    }

    function delete($id){
        $isDeleted =Blog::destroy($id);
        if($isDeleted){
            return redirect('list');
        }
    }

    function edit($slug){
        // $blog=Blog::findOrFail($slug);
        $blog = Blog::where('slug',$slug)->get()->first();

        if(!$blog)
        {
            return " Edit Blog not found";
        }
        return view('edit-blog',['data'=> $blog]);


    }

    function editBlog(Request $request ,$slug){

        $request->validate([
            'title'=>'required | min:10|max:80',
            'description'=>'nullable | min:100 | max:250',
            'image'=>'required|max:1024|mimes:jpeg,jpg,png,gif'

        ]);

        // $blog=Blog::findOrFail($slug);

        $blog = Blog::where('slug',$slug)->get()->first();
        // $blog->sl = $request -> sl;
        $blog->title = $request -> title;
        $blog->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $blog->description = $request -> description;
        $blog->save();
        if($blog){
            return redirect('list');
        }else{
            return "Blog not submit";
        }

}

function viewBlog($slug){
    // $blogdata= Blog::findOrFail($slug);
    $blogdata=Blog::where("slug",$slug)->get()->first();

    if(!$blogdata)
    {
        return "Blog not found";
    }

    return view("view-blog",["blog"=> $blogdata]);
}
}
