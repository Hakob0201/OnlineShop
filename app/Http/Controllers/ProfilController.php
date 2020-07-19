<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Myshops;
use App\Orders;
use App\Products;
use App\Users;
use Illuminate\Http\Request;
use Session;

class ProfilController extends Controller
{
    public function profile(){
        $user = Users::where('id', Session::get('id'))->first();
//        $category = Categories::all();
//        ->with('category',$category)
//        dd($user);
        return view('profil')->with('data',$user);
    }

    public function myorders(){
        $data = Orders::where('user_id', Session::get('id'))->with('MyOrderDetalis')->get();
//        dd($data[0]->MyOrderDetalis[0]->OrderDetailisProduct);
        return view('my_orders')->with('data',$data);
    }

    public function myshops_users($id)
    {
       $data =  Myshops::where('id',$id)->with('MyShopProducts')->get();
       return view('my_shop')->with('data',$data);
    }

    public function myshops_myorders($id)
    {
        $data =  Myshops::where('id',$id)->with('MyShopProducts')->get();
        return view('my_orders_shop')->with('data',$data);
    }

    public function settings(){

        return view('settings');
    }

}
