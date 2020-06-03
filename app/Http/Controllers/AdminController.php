<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class AdminController extends Controller
{
    public function index(){
        $products = Product::select()->with('product_type')->paginate(5);
        $product_type = ProductType::select('id','name')->get();
        return view('admin.product.index',compact('products','product_type'));
    }
}
