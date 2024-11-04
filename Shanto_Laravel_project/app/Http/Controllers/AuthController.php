<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Blog;
use App\Models\slider;
use App\Models\Contact;
use Session;

class AuthController extends Controller
{
    function login()
    {
        return view('login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with('success', 'Login Successfuly');
        }
        return redirect(route('login'))->with('error', 'Login fail');


    }

    function registration()
    {
        return view('registration');
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4|max:8',
        ]);
        // $user= new User();
        // $user->name= $request->name;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registrtion'))->with('error', 'Registion Failed');
        }
        return redirect(route('login'))->with('success', 'Registration Successfully');

    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }

    //blog function----
    function addBlog()
    {
        return view('add-blog');
    }


    function blogPost(Request $request)
    {
        $request->validate([
             'image'=>'required|max:2048|mimes:jpeg,jpg,png,gif',
            'title'=>'required | min:10|max:80',
            'description'=>'nullable | max:250',
            ]);
        $blog = new Blog();
        // $blog->image=$request->image;
        $blog->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        if($blog){
            return redirect('view-blog');
        }else{
            return 'Blog post fail';
        }
    }

    function viewBlog(Request $request)
    {
        $blogData = Blog::latest()->get();
        return view('view-blog', ['blogs' => $blogData]);
    }

    //title cntroller-------

    function addTitle()
    {
        return view('add-title');
    }

    function titlePost(Request $request)
    {
        $request->validate([
            'image'=>'required|max:2048|mimes:jpeg,jpg,png,gif',
           'title'=>'required | min:10|max:80',
           'description'=>'nullable | max:250',
           ]);
        $slider = new slider();
        $slider->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
    }

    public function slider()
    {
        $sliderData = slider::latest()->paginate(3);

        return view('slider', ['sliders' => $sliderData]);
    }


    //contact us---------
    function contact()
    {
        return view('contact');
    }

    function contactPost(Request $request)
    {
        $request->validate([
            'image'=>'required|max:2048|mimes:jpeg,jpg,png,gif',
           'email'=>'required | min:10|max:80',
           'massage'=>'nullable | max:250',
           ]);
        $contact = new Contact();
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->massage = $request->massage;
        $contact->save();

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        if($contact){
            return redirect(route('home'));
        }
    }

    public function delete($id){
          $isDeleted=Blog::destroy($id);

         if($isDeleted){
            return redirect('view-blog');
         }else{
            return 'Blog not delete';
         }
    }


    //edit function

   public function edit($slug){

    // $blog = Blog::find($slug);
    $blog = Blog::where('slug',$slug)->get()->first();

    if(!$blog)
    {
        return "Blog not found";
    }else{
        return view('edit',['data'=>$blog]);
    }

    }

    public function editPost(Request $request, $slug){
        $request->validate([
            'image'=>'required|max:2048|mimes:jpeg,jpg,png,gif',
           'title'=>'required | min:10|max:80',
           'description'=>'nullable | max:250',
           ]);
        // $blog = Blog::find( $slug );
        $blog = Blog::where('slug',$slug)->get()->first();
        $blog->image = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        if($blog){
            return redirect('view-blog');
        }else{
            return 'Blog edit fail';
        }

    }

    public function about(Request $request){
        $aboutData= About::latest()->get();
        return view('about',['abouts'=>$aboutData]);

}
}

