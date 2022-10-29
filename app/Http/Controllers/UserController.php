<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products=Product::all();
        return view ('users.index',compact('products'));
    }

    public function about(){
        return view('about-us');
    }
    public function productList(){
        return view('users.product-list');
    }
    public function productDetails($id){
        $product=Product::find($id);
        return view('users.product-details',compact('product'));
    }
}
