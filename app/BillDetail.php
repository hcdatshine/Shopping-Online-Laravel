<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public function bill(){
        $this->belongsTo('App\Bill','id_bill','id');
    }

    public function product() {
        $this->belongsTo('App\Product','id_product','id');
    }
}
