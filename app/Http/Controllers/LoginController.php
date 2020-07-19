<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Hash;
use Session;

class LoginController extends Controller
{
    public function LogIN(Request $rezult){
        $v = Validator::make($rezult->all(),[
            'mobile_email' => 'required|email',
            'password' => 'required',
        ]);
        if ($v->fails()){
            return Redirect::to('/')->withErrors($v)->withInput();
        }else{
            $email = $rezult->mobile_email;
            $password = $rezult->password;
            $user_data = array(
                'email'  => $rezult->get('mobile_email'),
                'password' => $rezult->get('password')
            );
            if(Auth::attempt($user_data))
            {
                $users = Auth::user();
//                dd(Auth::user()->status);
            }
            $user = DB::table('users')->where('email',$email)->get();
            if (!$user){
                return Redirect::to('/')->withErrors("The email address or password does not match")->withInput();
            }
            else if (!Hash::check($password,$user[0]->password)){
                return Redirect::to('/')->withErrors("The email address or password does not match")->withInput();
            }else{
                if(Auth::user()->status == 'block'){
                    return Redirect::to('/')->withErrors("Your account is blocked".' '.Auth::user()->user_block_time)->withInput();
                }
                foreach ($user as $user) {
                    if ($user->status=='disable'){
                        return Redirect::to('/');
                    }
                    $req = Session::put('id', $user->id);
                }
                return Redirect::to('/profile');

            }

        }
    }

}
