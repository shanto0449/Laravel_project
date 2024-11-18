<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminSubcriberController extends Controller
{
    public function index()
    {
        $subscribers = Subcriber::latest()->get();
        return view('admin.subscriber', compact('subscribers'));
    }

    public function destroy($subscriber)
    {
       $subscriber = Subcriber::findOrFail($subscriber)->delete();

       Toastr::success('Subscriber Successfully Deleted','Success');
       return redirect()->back();
    }
}

