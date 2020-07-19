<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myshops extends Model
{
    public $table = 'myshops';
    public function MyShopProducts(){
        return $this->hasMany('App\Products','myshop_id','id');
    }
}
