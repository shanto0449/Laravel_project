<?php

namespace App\Http\Controllers\Auth;
use Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $redirectTo;
    public function __construct(){
        if(Auth::check()&& Auth::user()->role->id ==1){
            $this->redirectTo = route('admin.dashboard');

        }else{
            $this->redirectTo = route('author.dashboard');
        }
       
    }
}
