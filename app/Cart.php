<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'carts';

    public function Cartmodalproduct (){
        return $this->belongsTo('App\Products','product_id','id');
    }
}
