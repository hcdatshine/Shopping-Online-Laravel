<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product= Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.index',compact('slide','new_product','sale_product'));
    }
    //21/04 dang lam sp voi sp tuong tu
    public function getAbout(){
        return view('page.about');
    }
    
    public function getProductType($type){
        // $product_type=ProductType::where('id',$type)->first();
        
        if($type == 0){
            $products = Product::where('new',1)->get();
        } 
        else {
            $products=Product::where('id_type',$type)->get();
        }
        $product_type=ProductType::select('name','id')->get();
        $product_type_name = ProductType::select('name')->where('id',$type)->first();
        // lấy sản phẩm được mua nhiều nhất theo thứ tự giảm dần
        $product_best_selling = Product::orderByDesc('solded')->paginate(3);
        return view('page.product_type',compact('products','product_type','product_type_name','product_best_selling'));
    }

    public function getContacts(){
        return view('page.Contacts');
    }
    
    public function getProduct(Request $req){
        $product_detail=Product::where('id',$req->id)->first();
        $product_related=Product::where('id_type',$product_detail->id_type)->paginate(3);
        return view('page.product',compact('product_detail','product_related'));
    }


}
