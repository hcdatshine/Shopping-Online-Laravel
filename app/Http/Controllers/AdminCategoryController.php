<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use Illuminate\Support\Facasdes\Log;

class AdminCategoryController extends Controller
{
    public function index() {
        $categories = ProductType::select()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'name'=>'required|unique:type_products,name|min:3|max:100',
            'image-product-type'=>'max:4048',
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.unique'=>'Tên đã tồn tại',
            'name.min'=>'Tên phải lớn hơn 3 ký tự',
            'name.max'=>'Tên phải nhỏ hơn 100 ký tự',
            'image-product-type.max' => 'Kích thước file quá lớn',
        ]);
        $category = new ProductType;
        $category->name = $request->name;
        $file = $request->file('image-product-type');
        $nameFile = $file->getClientOriginalName();
        $file->move('source/image/product',$nameFile);//chuyen file vao database local
        $category->image = $nameFile;//luu file tren server
        $category->save();
        return redirect()->back()->with('message','Thêm Category thành công');
    }

    public function getEdit($id){
        $editCategory = ProductType::find($id);
        return view('admin.category.edit',['editCategory'=>$editCategory]);
    }

    public function postEdit(Request $request,$id) {
        
        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'image-producttype'=>'max:4048',
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải lớn hơn 3 ký tự',
            'name.max'=>'Tên phải nhỏ hơn 100 ký tự',
            'image-product.max' => 'Kích thước file quá lớn',
        ]);
        $category = ProductType::find($id);
        $category->name = $request->name;
        if($request->hasFile('image-product')){
            $file = $request->file('image-product');
            $nameFile = $file->getClientOriginalName();
            $file->move('source/image/product',$nameFile);
            $category->image = $nameFile;
        }
        $category->save();
        return redirect()->route('category.index')->with('message','Sửa thành công');
    }

    public function Delete($id) {
        $products = Product::where('id_type','=',$id)->count();
        // dd($products);
        if ($products > 0){
            return redirect()->back()->with('danger','Category này đã có sản phẩm, phải xoá sản phẩm trước');
        }
        else{
        $category = ProductType::find($id);
        @unlink('image/product/'.$category->image);
        $category->delete();
        return redirect()->back()->with('message','Xoá thành công');
        }
    }
}
