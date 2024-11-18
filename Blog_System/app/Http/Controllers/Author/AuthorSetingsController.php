<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Brian2694\Toastr\Facades\Toastr;
use \Illuminate\Support\Str;
use Carbon\Carbon;
use Storage;

class AuthorSetingsController extends Controller
{
    public function index(){
        return view('author.settings');
    }

    public function updateProfile(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'email' =>'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $slug = str::slug($request->name);
        $user = User::findOrFail(Auth::id());
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }

            if(Storage::disk('public')->exists('profile/'.$user->image)){
                Storage::disk('public')->delete('profile/'.$user->image);

            }
            $image->move('profile/', $imageName);

            $imgManager = new ImageManager(new Driver());

            $profile = $imgManager->read('profile/' . $imageName);
            $profile->resize(500, 500)->save(public_path('storage/profile/' . $imageName));
            // Storage::disk('public')->put('profile/'.$imageName.$profile);

        }else{
          $imageName =  $user->image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->about = $request->about;
        $user->save();
        Toastr::success(' Update Profile Successfully Saved ', 'Success');
        return redirect()->route('author.settings.index');

    }

    public function updatePassword( Request $request){
        $validatedData = $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedpassword)){
            if(!Hash::check($request->password,$hashedpassword)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Change', 'Success');
                Auth::logout();
                return redirect()->back();
            }else{
                Toastr::error(' New Password cannot be the same as old password', 'Error');
                return redirect()->back();
            }
        } else{
            Toastr::error('Current Password not match', 'Error');
            return redirect()->back();
        }
    }
}
