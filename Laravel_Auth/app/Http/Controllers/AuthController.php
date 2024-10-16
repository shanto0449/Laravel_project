<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    function loginPost(Request $request){
        $request ->validate([

            'email'=> 'required',
            'password'=> 'required',
        ]);
        $credentials=$request->only('email','password');
        if(Auth::attempt( $credentials )){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error','Login failed');

        // $user= User::where('email',$request->email)->first();

        // if($user){
        //     if(Hash::check($request->password,$user->password)){
        //         $request->session()->put('loginId',$user->id);
        //         return redirect('/');
        //     }else{
        //         return back()->with('fail','password not matches');
        //     }

        // }else{
        //    return back()->with('fail','This email is not registerd');
        // }


    }

    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $request ->validate([
            'name'=>'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make( $request -> password);
        if($user -> save()){
            return redirect('login')->with('success','User register successfully');
}else{
    return redirect(route('register'))->with('error','Failed register');
}
}
}
