<?php

namespace App\Http\Controllers;
use  App\Models\Title;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("home");
    }



    
}
