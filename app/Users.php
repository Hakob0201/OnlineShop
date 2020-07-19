<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'users';

    public function MyOrderusers(){
        return $this->hasMany('App\Orders','user_id','id');
    }

    public function MyDelivery_Addresses(){
        return $this->hasMany('App\Delivery_Addresses','user_id','id');
    }

//    public function UserPhoto(){
//        return $this->belongsTo('App\Products_images','product_id','id');
//    }

}
