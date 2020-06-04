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

    public function postAdd(Request $request){
        $this->validate($request,[
            [
            'name'=>'required|unique:product,name|min:3|max:100',
            'image-product'=>'image|max:4048',
            'id_type' => 'required|alpha_num'
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải lớn hơn 3 ký tự',
            'name.unique'=>'Tên đã tồn tại',
            'name.max'=>'Tên phải nhỏ hơn 100 ký tự',
            'image-product.image' => 'Chọn lại ảnh',
            'image-product.max' => 'Kích thước file quá lớn',
            'id_type.required'=>'Bạn chưa nhập category',
            'id_type.alpha_num'=>'Category có dạng id là số'
            ]
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->id_type = $request->id_type;
        $product->new = 1;
        $product->soulded = 0;

        $file = $request->file('image-product');
        $nameFile = $file->getClientOriginalName();
        $file->move('source/image/product',$nameFile);//chuyen file vao database local
        $product->image = $nameFile;//luu file tren server
        $product->save();
        return redirect()->back()->with('message','Thêm Sản phẩm thành công');
    }

    public function getEdit($id){
        $editProduct = Product::find($id);
        $product_type = ProductType::select('id','name')->get();
        return view('admin/product/edit',['editProduct'=>$editProduct,'categories'=>$categories]);
    }


}
