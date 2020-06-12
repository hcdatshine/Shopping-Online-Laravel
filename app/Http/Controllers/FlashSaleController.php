<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\FlashSale;

class FlashSaleController extends Controller
{
    public function index(){
        $flashsales = FlashSale::select()->paginate(10);
        return view('admin/flashsale/index',compact('flashsales'));
    }
    public function getAdd(Request $request){
        $flashsale = new FlashSale;
        $flashsale->name = $request->name;
        $flashsale->description = $request->description;
        // dd($product);
        $flashsale->start = Carbon::parse($request->start)->format('Y-m-d H:i');
        $flashsale->end = Carbon::parse($request->end)->format('Y-m-d H:i');
        $flashsale->save();
        return redirect()->route('flashsale.index')->with('message','Tạo Flash Sale Thành Công');
    }

    public function getEdit($id){
        $editFlashsale = FlashSale::find($id);
        // dd($editFlashsale);
        return view('admin.flashsale.edit',['editFlashsale'=>$editFlashsale]);
    }

    public function postEdit(Request $request,$id){
        $flashsale = FlashSale::find($id);
        $flashsale->name = $request->name;
        $flashsale->name = $request->name;
        $flashsale->start = Carbon::parse($request->start)->format('Y-m-d H:i');
        $flashsale->end = Carbon::parse($request->end)->format('Y-m-d H:i');
        $flashsale->save();
        return redirect()->route('flashsale.index')->with('message','Sửa thành công');
    }
    
    public function delete($id){
        $flashsale = FlashSale::find($id);
        $flashsale->delete();
        return redirect()->back()->with('message',' Xoá thành công');
    }
}
