<?php

namespace App\Http\Controllers;

use App\Models\slider;
use App\Models\Blog;
use App\Models\About;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $sliderData = slider::latest()->get();
        $blogData = Blog::latest()->paginate(3);
        $aboutData= About::latest()->get();

        return view('home', ['sliders' => $sliderData,'blogs'=>$blogData,'abouts'=>$aboutData]);

    }



    public function slider()
    {
        $sliderData = slider::latest()->get();

        return view('slider', ['sliders' => $sliderData]);
    }



    // public function about(Request $request){
    //     $aboutData= About::latest()->get();
    //     return view('about',['abouts'=>$aboutData]);

}






