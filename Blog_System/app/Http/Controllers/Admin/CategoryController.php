<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Brian2694\Toastr\Facades\Toastr;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::latest()->get();
        return view('admin.category.index', compact('categorys'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2048' // Optional: add size limit
        ]);



        // get form image
        $image = $request->file('image');
        $slug = str::slug($request->name);
        if (isset($image)) {
            //            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();


            //            check category dir is exists
            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }
            $image->move('categoty/', $imagename);

            $imgManager = new ImageManager(new Driver());

            $category = $imgManager->read('categoty/' . $imagename);
            $category->resize(1600, 479)->save(public_path('storage/category/' . $imagename));


            if (!Storage::disk('public')->exists('slider')) {
                Storage::disk('public')->makeDirectory('slider');

            }
            // dd($imagename);
            // $image->move('category/slider/', $imagename);

            $Manager = new ImageManager(new Driver());

            $slider = $Manager->read('storage/category/' . $imagename);
            $slider->resize(500, 333)->save(public_path('storage/category/slider/' . $imagename));


        } else {
            $imagename = "default.png";
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        // $slider->image = $imagename;
// $slider->save();
        $category->save();
        Toastr::success('Category Successfully Saved :)', 'Success');
        return redirect()->route('admin.category.index');

    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg|max:2048' // Optional: add size limit
        ]);



        // get form image
        $image = $request->file('image');
        $slug = str::slug($request->name);
        $category = Category::find($id);
        if (isset($image)) {
            //            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            //Delete old image
            if (Storage::disk('public')->exists('category/' . $category->image)) {
                Storage::disk('public')->delete('category/' . $category->image);
            }


            //            check category dir is exists
            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }
            $image->move('categoty/', $imagename);

            $imgManager = new ImageManager(new Driver());

            $categoryImage = $imgManager->read('categoty/' . $imagename);
            $categoryImage->resize(1600, 479)->save(public_path('storage/category/' . $imagename));



        } else {
            $imagename = $category->image;
        }


        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->save();
        Toastr::success('Category Successfully Update :)', 'Success');
        return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (Storage::disk('public')->exists('category/' . $category->image)) {
            Storage::disk('public')->delete('category/' . $category->image);
        }

        $category->delete();
        Toastr::success('Category Successfully Deleted', 'Success');

        return redirect()->back();


    }
}
