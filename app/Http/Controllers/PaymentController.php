<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order_details;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;

class PaymentController extends Controller
{
//    /**
//     * success response method.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function stripe()
    {
        $data = Cart::where('user_id', Session::get('id'))->with('Cartmodalproduct')->get();
        $sum = 0;
        foreach ($data as $key) {
            $sum+=$key->subtotal;
        }
        Session::put('valuable',$data[0]->Cartmodalproduct->valuable);
        Session::put('sum',$sum);
        return view('stripe')->with('sum',$sum);
    }

    public function stripethis($id)
    {
        $data = Cart::where('user_id', Session::get('id'))->where('id', $id)->with('Cartmodalproduct')->get();
        $sum = 0;
        foreach ($data as $key) {
            $sum+=$key->subtotal;
        }
        Session::put('valuable',$data[0]->Cartmodalproduct->valuable);
        Session::put('thisid',$id);
        Session::put('sum',$sum);
        return view('stripe')->with('sum',$sum);
    }

//    /**
//     * success response method.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function stripePost(Request $request)
    {

        $rezult = false;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $charge =  Stripe\Charge::create ([
            "amount" => Session::get('sum') * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);
       if ($charge['status'] == 'succeeded')
       {
           $orders = new Orders();
           $orders -> user_id = Session::get('id');
           $orders -> sum  = Session::get('sum');
           $data = Cart::where('user_id', Session::get('id')) ->get();
           foreach ($data as $key)
           {
               $orders -> product_id = $key -> product_id;
           }
           $orders -> save();

           foreach ($data as $key)
           {
               $order_details = new Order_details();
               $order_details -> subtotal = $key -> subtotal;
               $order_details -> price = $key -> price;
               $order_details -> count = $key -> count;
               $order_details -> order_id = $orders -> id;
               $order_details -> product_id = $key -> product_id;
               $order_details -> save();
               $tata_order_detalis = Order_details::get();
               if (Session::has('thisid'))
               {
                   Cart::where('id',Session::get('thisid')) -> delete();
                   Session::forget('thisid');
                   $rezult = true;
                   return Redirect::to('index');
               }
               if (!Session::has('thisid'))
                   {
                       Cart::where('product_id',$key -> product_id) -> delete();
                       return Redirect::to('index');
               }

           }

       }

        Session::flash('success', 'Payment successful!');

        return back();
    }
}