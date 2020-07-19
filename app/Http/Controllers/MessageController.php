<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Messages;
use App\Product_colors;
use App\Product_size;
use App\Products;
use App\Products_categories_admin;
use App\Products_colors;
use App\Products_colors_admin;
use App\Products_images;
use App\Products_lengths;
use App\Products_lengths_admin;
use App\Products_sizes;
use App\Products_sizes_admin;
use App\User;
use App\Users;
use App\Wishlist;
use Illuminate\Support\Facades\Mail;
use Session;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show_message(){
        return view('show_message');
    }

    public function send_message(Request $request){
        $validator = Validator::make($request->all(), [
            'to_message' => 'required',
            'subject_message' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $data = Users::where('email',$request->to_message)->get();
        if (count($data) > 0){
            $message = new Messages();
            $message -> sender_id = Auth::id();
            foreach ($data as $key) {
                $message -> recipient_id = $key->id;
            }
            $message -> message_text = $request-> message;
            $message -> subject = $request->subject_message;
            $message -> save();
        }else{
            return response()->json(['email'=>'Wrong process']);
        }

    }

    public function print_message(){
       $data = Messages::where('recipient_id',Auth::id())->with('MessageSender')->get();
        return response()->json($data);
    }

    public function profil_show_message($id)
    {
        $data = Messages::where('recipient_id',Auth::id())
            ->where('id',$id)
            ->with('MessageSender')->get();
        return view('print_message')->with('data',$data);

    }
    //////////end admin add categories/////////////////////




}
