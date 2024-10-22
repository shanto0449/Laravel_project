<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\Blog;
use  App\Models\Title;
use App\Models\Contact;
use Session;

class AuthController extends Controller
{
    function login(){
      return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' =>'required',
            'password'=> 'required',
        ]);
        $credentials=$request ->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with('success','Login Successfuly');
        }
        return redirect(route('login'))->with('error','Login fail');


    }

    function registration(){
        return view('registration');
    }

    function registrationPost(Request $request){
        $request ->validate([
            'name'=>'required',
            'email'=> 'required|unique:users',
            'password'=> 'required',
        ]);
        // $user= new User();
        // $user->name= $request->name;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);

        $user=User::create($data);

        if(!$user){
            return redirect(route('registrtion'))->with('error','Registion Failed');
        }
        return redirect(route('login'))->with('success','Registration Successfully');

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }

    //blog function----
    function addBlog(){
        return view('add-blog');
    }


    function blogPost(Request $request){
        $blog= new Blog();
        // $blog->image=$request->image;
        $blog->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $blog->title = $request -> title;
        $blog->description = $request -> description;
        $blog->save();
    }

    function viewBlog(Request $request){
        $blogData=Blog::latest()->paginate(3);
        return view('view-blog',['blogs'=>$blogData]);
    }

    //title cntroller-------

    function addTitle(){
        return view('add-title');
    }

    function titlePost(Request $request){
        $title = new Title();
        $title->title = $request -> title;
        $title->description = $request -> description;
        $title->save();
    }

    function viewTitle(Request $request){
        $titleData=Title::latest()->paginate(1);
        return view('view-title',['titles'=>$titleData]);
    }


    //contact us---------
    function contact(){
        return view('contact');
    }

    function contactPost(Request $request){
        $contact= new Contact();
        $contact->subject = $request -> subject;
        $contact->email= $request -> email;
        $contact->massage= $request ->massage;
        $contact->save();
    }

}
