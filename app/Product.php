<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FlashSale;
use App\ProductFlashSale;
use Carbon\Carbon;
class Product extends Model
{
    protected $table = "product";

    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type');
    }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }

    public function flashsales(){
        return $this->belongsToMany('App\FlashSale','product_flashsale');
    }

    public function isFlashSale() {
        $id = $this->id;
        //ktra sp co trong product flash sale va co dang sale hya khong
        $productflashsales = ProductFlashSale::select()->with('flashSale')->where('product_id','=',$id)->first();
        // kiem tra co phai la sp flash sale khong 
        // dd($productflashsales);
        if(!is_null($productflashsales) && (count($productflashsales)>0 && $productflashsales->flashSale->end>Carbon::now())){
            return true;
        }
        else 
            return false;
    }
}
