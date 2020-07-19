<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Users;
use App\Wishlist;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Hash;
use Session;

class CartController extends Controller
{
    public function show_cart($productcart){
        if(md5('productcart')==$productcart){
            $data_cart = Cart::where('user_id', Session::get('id'))
                ->orderBy('id', 'desc')
                -> get();
            return view('cart')->with('data_cart',$data_cart);
        }
    }

    public function remove_cart($id){
      Cart::where('id',$id)->delete();
        return Redirect::to('/38b77cd3d08c73194143803294e8095c');
    }


}
