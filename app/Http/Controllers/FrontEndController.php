<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function products(){
        $products = Product::all();
        $categories= Category::all();
        return view('frontend.collections.products.index',compact('products','categories'));
    }

}
