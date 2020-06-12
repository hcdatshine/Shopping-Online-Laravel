<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\ProductType;
use App\FlashSale;
use App\ProductFlashSale;

class ProductFlashSaleController extends Controller
{
    public function index(){
        $productflashsales = ProductFlashSale::select()->paginate(10);
        $category = ProductType::with('product')->get();
        $flashsale = FlashSale::all();
        return view('admin/productflashsale/index',compact('productflashsales','flashsale','category'));
    }

    public function getAdd(Request $request){
        $product_flash_sale = new ProductFlashSale;
        $product_flash_sale->product_id = $request->product_id;
        $product_flash_sale->flash_sale_id = $request->flash_sale_id;
        $product_flash_sale->discount_percent = $request->discount_percent;
        $product_flash_sale->save();
        return redirect()->route('productflashsale.index')->with('message','Thêm Product Flash Sale Thành Công');
    }
    public function getEdit($id){
        $editProductFlashsale = ProductFlashSale::find($id);
        // dd($editFlashsale);
        return view('admin.productflashsale.edit',['editProductFlashsale'=>$editProductFlashsale]);
    }

    public function postEdit(Request $request,$id){
        $product_flash_sale = ProductFlashSale::find($id);
        $product_flash_sale->product_id = $request->product_id;
        $product_flash_sale->flash_sale_id = $request->flash_sale_id;
        $product_flash_sale->discount_percent = $request->discount_percent;
        $product_flash_sale->save();
        return redirect()->route('productflashsale.index')->with('message','Sửa thành công');
    }
    
    public function Delete(){
        $product_flash_sale = ProductFlashSale::find($id);
        $product_flash_sale->delete();
        return redirect()->back()->with('message',' Xoá thành công');
    }
}
