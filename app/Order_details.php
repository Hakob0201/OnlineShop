<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    public $table = 'order_details';
    public function OrderDetailisProduct(){
        return $this->belongsTo('App\Products','product_id','id');
    }
    public function OrderProduct(){
        return $this->belongsTo('App\Orders','order_id','id');
    }

}
