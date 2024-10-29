<?php

namespace App\Http\Controllers;


use App\Models\carosuel;
use Illuminate\Http\Request;

class CarosuelController extends Controller
{
    public function index(){
        $carouselImages=carosuel::all();

        return view('carosuel',compact('carouselImages'));
    }

    public function form(){
        return view('form');
    }

    public function create(Request $request){
        $request->validate([
            'image'=>'required',
        ]);
       $uploadImage=$request->file('image');
       $imageNameWithExt=$uploadImage->getClientOriginalName();
       $imageName=pathinfo($imageNameWithExt,PATHINFO_FILENAME);
       $ImageExt=$uploadImage->getClientOriginalExtension();
       $updateImage=$imageName . time() . "." . $ImageExt;
       $request->image->move(public_path('/images/'), $updateImage);
       $carouse= carosuel::create([
        'image'=> $updateImage,
       ]);
       return redirect()->back()->with('message','Carousel Image update Successfully.');

    }

    public function slider(){
        $images=carosuel::all();

        return view('slider',compact('images'));
}
}
