<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Delivery_Addresses;
use App\Messages;
use App\Myshops;
use App\Products_categories_admin;
use App\Products;
use App\Products_images;
use App\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use DB;
use Hash;
use Session;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use App;

class MainController extends Controller
{
    public function index(){
        $products = Products::with('ProductPhoto')->get();
        return view('index')->with('products',$products);
    }

    public function login(){
        return view('login');
    }

    public function logout(){
        Session:: flush();
        return Redirect::to('index');
    }


    public function registr(){
        return view('registr');
    }

    public function UserInformation(){
        $user = Users::where('id', Session::get('id'))->get();
        return response()->json($user);
    }

    public function add_scores(){
        return view('add_scores');
    }


//    public function category(){
//        $categoryObject = Category::where('code','fjfj')->first();
//
//        return view('category',compact('$categoryObject'));
//    }



    public function addregistr(Request $r){
        $v = Validator::make($r->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_email' => 'required|email|unique:users,email',
            'new_password' => 'required|min:8',
            'day'=>'required',
            'months'=>'required',
            'year'=>'required',
            'gender'=>'required',
            'confirm'=>'required',
            'confirm_password' => 'required|same:new_password',


        ]);
        if ($v->fails()){
            return Redirect::to('registr')->withErrors($v)->withInput();
        }else{

            $name = $r->first_name;
            $surname = $r->last_name;
            $email = $r->mobile_email;
            $password = HASH :: make($r->new_password);
            $day = $r->day;
            $months = $r->months;
            $gender = $r->gender;
            $year = $r->year;
            if ($gender == 'male') {
                $photo = 'images/difold/user_male.png';
            }
            if ($gender == 'female') {
                $photo = 'images/difold/user_fmale.png';
            }
            $data = array('name'=>$name,'surname'=>$surname,'email'=>$email,'password'=>$password,'day'=>$day,'months'=>$months,'year'=>$year,'gender'=>$gender,'photo'=>$photo);
            DB::table('users')->insert($data);
            $id = DB::getPdo()->lastInsertId();
            $info = [
                'name' => $name,
                'link'=>url('/verify/'.md5($id.$email).'/'.$id)
            ];
            Mail::send('mail',$info,function ($m) use($name,$email){
                $m-> to($email,'$name')->subject('activation');
                $m->from('hakob.vardanyan.1996@gmail.com','Shop admin');
            });
            return Redirect::to('/')->withErrors('Check your email address')->withInput();
        }


    }
    function verify($hash,$id){
        $user = Users::where('id',$id)->first();
        if($user){
            if(md5($user->id.$user->email)==$hash){
                Users::where('id',$id)->update(['status'=>'active']);
                return Redirect::to('/');
            }
        }
    }


    public function forgot_password(Request $request) {
        $user_email =  Users::where('email',$request->mail)->first();
        $kamu = $request->mail;
        if ($user_email) {
            $name = $user_email->name;
            $code = rand();
            $info = [
                'name' => $user_email->name,
                'link'=>$code,
            ];
            Mail::send('forg',$info,function ($m) use($kamu){
                $m -> to($kamu)->subject('activation');
                $m -> from('hakob.vardanyan.1996@gmail.com','Shop admin');
            });
            Users::where('email',$request->mail)->update(['confirmation_code'=>$code]);
        }else{
            return response()->json(['success'=>'ayspisi hasce goyutyun chuni']);
        }
    }

    public function confirmation_code(Request $request) {

        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
            'confirmation_code' => 'required',

        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $user = Users::where('confirmation_code',$request->confirmation_code)->first();
        if (!$user) {
            return response()->json(['errors'=>'sxal cod']);
        }else{

            Users::where('confirmation_code',$request->confirmation_code)->update(['password'=>HASH :: make($request->new_password)]);
        }

    }

    public function Editpersonalinformation(Request $request)

    {
        $success = [];
        if ($request->edit_name)
        {
            Users::where('id', Session::get('id'))->update(['name' => $request -> edit_name]);
            $success[] = 'Name';
        }

        if ($request->edit_surname)
        {
            Users::where('id', Session::get('id'))->update(['surname' => $request -> edit_surname]);
            $success[] = 'Surname';
        }

        if ($request->edit_personal_day)
        {
            Users::where('id', Session::get('id'))->update(['day' => $request -> edit_personal_day]);
            $success[] = 'Day';
        }

        if ($request->edit_personal_months)
        {
            Users::where('id', Session::get('id'))->update(['months' => $request -> edit_personal_months]);
            $success[] = 'Months';
        }

        if ($request->edit_personal_year)
        {
            Users::where('id', Session::get('id'))->update(['year' => $request -> edit_personal_year]);
            $success[] = 'Year';
        }

        if ($request->edit_personal_photo)
        {
            $file = $request->edit_personal_photo;
            $name = rand().'.'.$file->getClientOriginalExtension();
            $ext= $file->getClientOriginalName();
            $file->move(public_path().'/images/'. Session::get('id'),$name);
            $img_name = "images/". Session::get('id') ."/" . $name;
            Users::where('id', Session::get('id'))->update(['photo' => $img_name]);
            $success[] = 'Photo';
        }

        return response()->json($success);

    }

    public function appenddeliveryaddresses(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'receiver_name' => 'required',
            'country_region' => 'required',
            'street_house_flat' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'mobile_phone' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $Delivery_Addresses = new Delivery_Addresses();
        $Delivery_Addresses -> receiver_name = $request -> receiver_name;
        $Delivery_Addresses -> country_region = $request -> country_region;
        $Delivery_Addresses -> street_house_flat = $request -> street_house_flat;
        $Delivery_Addresses -> city = $request -> city;
        $Delivery_Addresses -> postcode = $request -> postcode;
        $Delivery_Addresses -> mobile_phone = $request -> mobile_phone;
        $Delivery_Addresses -> user_id = Session::get('id');
        $Delivery_Addresses -> save();


    }

    public function neweditemail(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'old_email_address' => 'required|email',
            'new_email_address' => 'required|email',
            'repeat_email_address' => 'required|email|same:new_email_address',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $data = Users::where('id',Session::get('id'))->first();
        if ($request->old_email_address != $data->email){
            return response()->json(['errors_old'=>'Old email non-compliance']);
        }
        else {
            $data_email  = Users::get();
            foreach ($data_email as $key)
            {
                $email = $key -> email;
                if ($email == $request -> new_email_address)
                {
                    return response()->json(['errors_old'=>'ays hascen arden ogtagorcvac e']);

                }

            else{
                $code = rand();
                $info = [
                    'name' => $data->name,
                    'link' => $code,
                ];
                $kamu = $request->new_email_address;
                Mail::send('forg', $info, function ($m) use ($kamu) {
                    $m->to($kamu)->subject('activation');
                    $m->from('hakob.vardanyan.1996@gmail.com', 'Shop admin');
                });
                Users::where('email', $request->old_email_address)->update(['confirmation_code' => $code]);
                return response()->json(['email'=>$kamu]);
            }

            }

        }
    }

    public function newedit_email_user_confirmation (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_email_confirmation_code' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $user = Users::where('confirmation_code',$request->new_email_confirmation_code)->first();
        if (!$user) {
            return response()->json(['errors_old'=>'sxal cod']);
        }else{

            Users::where('confirmation_code',$request->new_email_confirmation_code)->update(['email'=>$request->email]);
        }

    }

    public function neweditpassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'repeat_password' => 'required|same:new_password',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $data = Users::where('id',Session::get('id'))->first();

        if (!Hash::check($request->old_password,$data->password)){
            return response()->json(['errors_old'=>'Old password non-compliance']);
        }

        Users::where('id',Session::get('id'))->update(['password' => HASH :: make($request->new_password)]);
    }

    public function newremovmyshop(Request $request)
    {
        Myshops::where('id',$request->removemyshop)->delete();
    }


    public function categories(){
        $category = Categories::all();
        return with($category);
    }

    public function catgory($code){
        $category = Categories::where('code',$code)->first();
    }

    public function create(Request $request)
    {
        $data = $request->only(['id_list', 'id_hotel']);
  return response ()->json ("OK");
}



    public function add_product(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_photos' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
            $new_name = time().'.'.request()->file('image')->getClientOriginalExtension();
            $images->move(public_path('images'), $new_name);
        }

        $images = $request -> product_photos;

        return response()->json(['success'=>$images]);

    }


    public function AddMyShop(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'photo' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $file = $request->photo;
        $name = rand().'.'.$file->getClientOriginalExtension();
        $ext= $file->getClientOriginalName();
        $file->move(public_path().'/images/'. Session::get('id'),$name);
        $img_name = "images/". Session::get('id') ."/" . $name;
        $myshops = new Myshops();
        $myshops -> name = $request -> name;
        $myshops -> code =  rand();
        $myshops -> images = $img_name;
        $myshops -> user_id =  Session::get('id');
        $myshops -> save();
    }

    public function PrintMyShop(){
        $myshop = Myshops::where('user_id', Session::get('id'))->get();
        return response()->json($myshop);
    }

    public function PrintAdminCategoria(){
        $printadmincategoria = Products_categories_admin::get();
        return response()->json($printadmincategoria);
    }

    public function locale($locale) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function test()
    {
        dd('dkzvjvcvzjxbhvjhzcxbvhjcxzbvcbxvjbcxzjvbcxjvbcjhxbvjcxbvcxv');
    }

}
