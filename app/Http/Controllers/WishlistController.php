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

class WishlistController extends Controller
{
    public function show_wishlist(){
        $data_wishlist = Wishlist::where('user_id', Session::get('id'))
            ->orderBy('id', 'desc')
            -> get();
        return view('wishlist')->with('data_wishlist',$data_wishlist);
    }

    public function remove_wishlist($id){
        $data_wishlist = Wishlist::where('id',$id)
            ->delete();
        return Redirect::to('/productcart/wishlist');
    }


}
