<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table = 'products';

    public function ProductPhoto(){
        return $this->hasMany('App\Products_images','product_id','id');
    }

    public function ProductSiazes(){
        return $this->hasMany('App\Products_Sizes','product_id','id');
    }

    public function ProductLengths(){
        return $this->hasMany('App\Products_Lengths','product_id','id');
    }

    public function ProductColors(){
        return $this->hasMany('App\Products_Colors','product_id','id');
    }

    public function ProductOrderdetalis(){
        return $this->hasMany('App\Order_details','product_id','id');
    }

    public function Productshop(){
        return $this->belongsTo('App\Myshops','myshop_id','id');
    }
}
