<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $table = 'orders';
    public function MyOrderDetalis(){
        return $this->hasMany('App\Order_details','order_id','id');
    }

    public function MyOrderUsers(){
        return $this->belongsTo('App\Users','user_id','id');
    }
}
