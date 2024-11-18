<?php

namespace App\Http\Controllers;

use App\Models\Subcriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class SubcriberController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subcribers',
         ]);

         $subcriber = new Subcriber();

         $subcriber ->email=$request->email;
         $subcriber ->save();

         Toastr::success('Subcribe Successfully','success');

         return redirect()->back();

    }
}
