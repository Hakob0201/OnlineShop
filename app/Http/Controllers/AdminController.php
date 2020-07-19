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

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function derr()
    {
        $data = Users::get();
        return response()->json([

            'users' => $data

        ], Response::HTTP_OK);

    }

    public function delet_user_admin(Request $request)
    {
        User::where('id',$request->user_id)->delete();

    }

    public function block_user_admin(Request $request)
    {
        Users::where('id',$request->user_id)->update(['status'=>'block','user_block_time'=>$request->date_block,'block_message'=> $request->block_message]);
        $user_email =  Users::where('id',$request->user_id)->first();
        $kamu = $user_email->email;
            $name = $user_email->name;
            if ($request->block_message){
                $mess = $request->block_message;
            }else{
                $mess = '';
            }
        if ($request->date_block){
            $time = $request->date_block;
        }else{
            $time = 'indefinitely';
        }
            $info = [
                'name' => $name,
                'link' =>'Your account is blocked'.' '. $time,
                'block_message' => $mess,
            ];
            Mail::send('adminblock',$info,function ($m) use($kamu){
                $m -> to($kamu)->subject('activation');
                $m -> from('hakob.vardanyan.1996@gmail.com','Shop admin');
            });

//        $process = Process::fromShellCommandline();
        dd($request);
        

        echo $process->getOutput();

    }


    public function active_user_admin(Request $request)
    {
        Users::where('id',$request->user_id)->update(['status'=>'active']);
        $user_email =  Users::where('id',$request->user_id)->first();
        $kamu = $user_email->email;
        $name = $user_email->name;
        $info = [
            'name' => $name,
            'link'=>'Your account is actived',
        ];
        Mail::send('adminactive',$info,function ($m) use($kamu){
            $m -> to($kamu)->subject('activation');
            $m -> from('hakob.vardanyan.1996@gmail.com','Shop admin');
        });
    }


    /////////////print admin sizes/////////////////
    public function print_sizes_admin()
    {
        $data = Products_sizes_admin::get();
        return response()->json([

            'sizes' => $data

        ], Response::HTTP_OK);

    }
    //////////end admin sizes/////////////////////

    /////////////print admin sizes/////////////////
    public function delete_sizes_admin(Request $request)
    {
        Products_sizes_admin::where('id',$request->size_id)->delete();
    }
    //////////end admin sizes/////////////////////

    /////////////print admin add sizes/////////////////
    public function add_sizes_admin(Request $request)
    {
        $size = new Products_sizes_admin();
        $size -> name = $request -> size;
        $size -> save();
    }
    //////////end admin add sizes/////////////////////

    /////////////print admin lengths/////////////////
    public function print_lengths_admin()
    {
        $data = Products_lengths_admin::get();
        return response()->json([

            'lengths' => $data

        ], Response::HTTP_OK);

    }
    //////////end admin lengths/////////////////////

    /////////////print admin lengths/////////////////
    public function delete_length_admin(Request $request)
    {
        Products_lengths_admin::where('id',$request->length_id)->delete();
    }
    //////////end admin lengths/////////////////////

    /////////////print admin add lengths/////////////////
    public function add_length_admin(Request $request)
    {
        $size = new Products_lengths_admin();
        $size -> name = $request -> length;
        $size -> save();
    }
    //////////end admin add lengths/////////////////////


    /////////////print admin colors/////////////////
    public function print_colors_admin()
    {
        $data = Products_colors_admin::get();
        return response()->json([

            'colors' => $data

        ], Response::HTTP_OK);

    }
    //////////end admin colors/////////////////////

    /////////////print admin lengths/////////////////
    public function delete_color_admin(Request $request)
    {
        Products_colors_admin::where('id',$request->color_id)->delete();
    }
    //////////end admin colors/////////////////////

    /////////////print admin add colors/////////////////
    public function add_color_admin(Request $request)
    {
        $size = new Products_colors_admin();
        $size -> name = $request -> color;
        $size -> save();
    }
    //////////end admin add colors/////////////////////



    /////////////print admin categories/////////////////
    public function print_categories_admin()
    {
        $data = Products_categories_admin::get();
        return response()->json([

            'categories' => $data

        ], Response::HTTP_OK);

    }
    //////////end admin categories/////////////////////

    /////////////print admin categories/////////////////
    public function delete_category_admin(Request $request)
    {
        Products_categories_admin::where('id',$request->category_id)->delete();
    }
    //////////end admin categories/////////////////////

    /////////////print admin add categories/////////////////
    public function add_category_admin(Request $request)
    {
        $size = new Products_categories_admin();
        $size -> name = $request -> category;
        $size -> save();
    }
    //////////end admin add categories/////////////////////



    public function print_inbox_admin()
    {
        $data = Messages::where('recipient_id',Auth::id())->with('MessageSender')->get();
        return response()->json([

            'inboxs' => $data

        ], Response::HTTP_OK);
    }
    //////////end admin add categories/////////////////////






    public function print_showmessage_admin($id)
    {
        $data = Messages::where('recipient_id',Auth::id())
            ->where('id',$id)
            ->with('MessageSender')->get();
        return response()->json([

            'message' => $data

        ], Response::HTTP_OK);

    }
    //////////end admin add categories/////////////////////























    ////////////////////////////////time control/////////////////////////

    function time_ago_in_php($timestamp){
        date_default_timezone_set("Asia/Yerevan");
        $time_ago        = strtotime($timestamp);
        $current_time    = time();
        $time_difference = $current_time - $time_ago;
        $seconds         = $time_difference;

        $minutes = round($seconds / 60); // value 60 is seconds
        $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
        $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
        $weeks   = round($seconds / 604800); // 7*24*60*60;
        $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
        $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

        if ($seconds <= 60){

            return "Just Now";

        } else if ($minutes <= 60){

            if ($minutes == 1){

                return "one minute ago";

            } else {

                return "$minutes minutes ago";

            }

        } else if ($hours <= 24){

            if ($hours == 1){

                return "an hour ago";

            } else {

                return "$hours hrs ago";

            }

        } else if ($days <= 7){

            if ($days == 1){

                return "yesterday";

            } else {

                return "$days days ago";

            }

        } else if ($weeks <= 4.3){

            if ($weeks == 1){

                return "a week ago";

            } else {

                return "$weeks weeks ago";

            }

        } else if ($months <= 12){

            if ($months == 1){

                return "a month ago";

            } else {

                return "$months months ago";

            }

        } else {

            if ($years == 1){

                return "one year ago";

            } else {

                return "$years years ago";

            }
        }
    }

    /////////////////////////////end time control//////////////////////


    function get_timeago( $ptime )
    {
        $etime = time() - $ptime;

        if( $etime < 1 )
        {
            return 'less than '.$etime.' second ago';
        }

        $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60             =>  'hour',
            60                  =>  'minute',
            1                   =>  'second'
        );

        foreach( $a as $secs => $str )
        {
            $d = $etime / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }



}
