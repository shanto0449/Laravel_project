<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function review_emanage(){
        return view('admin.product.manage_product_review');
    }

    public function index(){
        return view('admin.product.manage');
    }
}
