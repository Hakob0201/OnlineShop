<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Myshops;
use App\Order_details;
use App\Orders;
use App\Products_colors;
use App\Products;
use App\Products_categories_admin;
use App\Products_colors_admin;
use App\Products_images;
use App\Products_lengths;
use App\Products_lengths_admin;
use App\Products_sizes;
use App\Products_sizes_admin;
use App\Users;
use App\Wishlist;
use Session;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function add_product($id){
        $data =  Myshops::where('id',$id)->with('MyShopProducts')->get();
        return view('my-shop/add_product')->with('data',$data);
    }

    public function PrintAdminCategoriaProduct(){
        $printadmincategoria = Products_categories_admin::get();
        return response()->json($printadmincategoria);
    }

    public function PrintAdmincolorProduct(){
        $data = Products_colors_admin::get();
        return response()->json($data);
    }

    public function PrintAdminsizesProduct(){
        $data = Products_sizes_admin::get();
        return response()->json($data);
    }


    public function PrintAdminlengthsProduct(){
        $data = Products_lengths_admin::get();
        return response()->json($data);
    }

    public function shop_cart(){
        $user = Users::where('id', Session::get('id'))->first();
        $category = Categories::all();
        $cart = Cart::where('user_id', Session::get('id'))
            ->with('ProductCart')
            ->with('ProductImages')
            ->get();
    return view('shop_cart')->with('data',$user)->with('category',$category)->with('cart',$cart);
    }

    public function wishlist(){
        $user = Users::where('id', Session::get('id'))->first();
        $category = Categories::all();
        $wishlist = Wishlist::where('user_id', Session::get('id'))
            ->with('ProductWishlists')
            ->with('ProductImagesWishlists')
            ->get();
        return view('wishlist')->with('data',$user)->with('category',$category)->with('wishlist',$wishlist);
    }

    public function index(){
        $user = Users::where('id', Session::get('id'))->first();
        $category = Categories::all();
        $products = Products::join('products_images', 'products.id', '=', 'products_images.product_id')
            ->select('products_images.name as images','products.name','products_images.status','products.valuable','products.price','products.count','products.id as product_id')
            ->get();
        return view('index')->with('data',$user)->with('category',$category)->with('products',$products);
    }

    public function show_product($id){
        $user = Users::where('id', Session::get('id'))->first();
        $category = Categories::all();
        $product = Products:: where('products.id',$id)->get();
        return view('product')->with('product',$product)->with('data',$user)->with('category',$category);;

    }

    public function my_product(){
        $user = Users::where('id', Session::get('id'))->first();
        $category = Categories::get();
        $product = Products:: where('user_id',Session::get('id'))->get();
        return view('my_product')->with('products',$product)->with('data',$user)->with('category',$category);;

    }

    public function my_product_delete(Request $request){
        Products::where('id',$request->product_id)->Delete();
        return $request->product_id;
    }

    public function open_modal_eddit(Request $request){
        $product = Products:: where('products.id',$request['id'])->with('Produc')->with('ProductSizes')->with('ProductColors')->with('ProductCategories')->get();
        $categories = Categories::all();
//        return response()->json($product$categories);
        return  ['product' => $product,'categories'   => $categories];
    }

    public function new_AddProduct(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'count' => 'required|integer',
            'price' => 'required|integer',
            'add_product_photos'=>'required',
            'add_product_category'=>'required',
            'add_product_colors'=>'required',
            'add_product_valuable'=>'required',
            'add_product_photo_main' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors()->all());
        }

        $product = new Products();
        $product -> name = $request->name;
        $product -> code = rand();
        $product -> category = $request->add_product_category;
        $product -> myshop_id = $request->myshop_id;
        $product -> description = $request->description;
        $product -> valuable = $request->add_product_valuable;
        $product -> price = $request->price;
        $product -> count = $request->count;
        $product -> save();
        foreach ($request->add_product_colors as $key)
        {

            $colors = new Products_colors();
            $colors -> name = $key;
            $colors -> product_id = $product->id;
            $colors -> save() ;
        }

        if ($request->add_product_sizes != '')
        {
            foreach ($request->add_product_sizes as $key){

                $sizes = new Products_sizes();
                $sizes -> name = $key;
                $sizes -> product_id = $product->id;
                $sizes -> save() ;
            }
        }

        if ($request->add_product_lengths != '')
        {
            foreach ($request->add_product_lengths as $key){

                $lengths = new Products_lengths();
                $lengths -> name = $key;
                $lengths -> product_id = $product->id;
                $lengths -> save() ;
            }
        }

        foreach ($request->add_product_photos as $key) {
            $file = $key;
            $name = rand().'.'.$file->getClientOriginalExtension();
            $ext= $file->getClientOriginalName();
            $file->move(public_path().'/images/'. Session::get('id'). "/". $product->id,$name);
            $img_name = "images/". Session::get('id') ."/" .$product->id . "/" . $name;

            if ($file->getClientOriginalName()==$request->add_product_photo_main)
            {

                $photos = new Products_images();
                $photos->name = $img_name;
                $photos->status = 'main';
                $photos->product_id = $product->id;
                $photos->save();
            }
            else{
                $photos = new Products_images();
                $photos->name = $img_name;
                $photos->status = 'null';
                $photos->product_id = $product->id;
                $photos->save();
            };
        }
        return response()->json(['product'=>$product->id]);
    }


    public function show_products($category,$id){
        $product = Products::where('id',$id)
            ->orderByDesc('id')
            ->with('ProductPhoto')->where('category',$category)
            ->with('ProductSiazes')
            ->with('ProductLengths')
            ->with('ProductColors')
            ->get();

        $fidback = Orders::where('product_id',$id)->with('MyOrderDetalis')->with('MyOrderUsers')->get();
        return view('product')->with('product',$product)->with('fidback',$fidback);
    }


    public function story_of_my_product(Request $request) {
        $data = Products::where('id',$request->id)->with('ProductPhoto')->with('ProductSiazes')->with('ProductLengths')->with('ProductColors') ->with('Productshop')->get();
        foreach ($data as $key){
            //$userId = Auth::id();

            if ($key->Productshop->user_id == Auth::id())
                return response()->json($data);
        }
        $error_unauthorized = 'Unauthorized action';
        return response()->json(['error_unauthorized'=>$error_unauthorized]);

    }

    public function new_editProduct(Request $request)

    {
        $dat = Products::with('Productshop');
        $validator = Validator::make($request->all(),[
            'edit_product_count' => 'integer',
            'edit_product_price' => 'integer',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors()->all());
        }

       else
       {
           if ($request->edit_product_name) {
               Products::where('id', $request->product_id)->update(['name' => $request->edit_product_name]);
           }

           if ($request->edit_product_description) {
               Products::where('id', $request->product_id)->update(['description' => $request->edit_product_description]);
           }

           if ($request->edit_product_price) {
               Products::where('id', $request->product_id)->update(['price' => $request->edit_product_price]);
           }

           if ($request->edit_product_count) {
               Products::where('id', $request->product_id)->update(['count' => $request->edit_product_count]);
           }

           if ($request->edit_product_sizes) {
               for ($i = 0; $i<count($request->edit_product_sizes); $i++) {
                   Products_sizes::where('product_id', $request->product_id)->where('name',$request->edit_product_sizes[$i])->delete();
               }
           }

           if ($request->edit_product_lengths) {
               for ($i = 0; $i<count($request->edit_product_lengths); $i++) {
                   Products_lengths::where('product_id', $request->product_id)->where('name',$request->edit_product_lengths[$i])->delete();
               }
           }

           if ($request->edit_product_colors) {
               for ($i = 0; $i<count($request->edit_product_colors); $i++) {
                   Products_colors::where('product_id', $request->product_id)->where('name',$request->edit_product_colors[$i])->delete();
               }
           }

           if ($request->edit_product_images) {
               for ($i = 0; $i<count($request->edit_product_images); $i++) {
                   Products_images::where('product_id', $request->product_id)->where('name',$request->edit_product_images[$i])->delete();
               }
           }

           if (!$request->edit_product_photo_main && $request->my_product_images_main) {
               Products_images::where('product_id', $request->product_id)->where('status','main')->update(['status' =>'null']);
               Products_images::where('product_id', $request->product_id)->where('name',$request->my_product_images_main)->update(['status' =>'main']);
           }

           if ($request->add_product_photos){
               for ($i = 0; $i<count($request->add_product_photos); $i++){
                   $file = $request->add_product_photos[$i];
                   $name = rand().'.'.$file->getClientOriginalExtension();
                   $ext= $file->getClientOriginalName();


                   $file->move(public_path().'/images/'.$request->product_id,$name);

                   $v = "images/".$request->product_id ."/" . $name;
                   $productsImages = new Products_images();
                   if ($request->edit_product_photo_main){$productsImages -> status = "main";Products_images::where('product_id', $request->product_id)->where('status','main')->update(['status' =>'null']);}
                   else{$productsImages -> status = "null";}
                   $productsImages -> name = $v;
                   $productsImages -> product_id = $request->product_id;
                   $productsImages -> save();
               }

           }

           if ($request->add_product_sizes){
               $s_n = [];
               $sizes = Products_sizes::where('product_id', $request->product_id)->get();
               if (count($sizes) > 0) {
                   foreach ($sizes as $key)
                   {
                       $s_n[] = $key->name;
                   }
                   for ($i = 0; $i < count($request->add_product_sizes); $i++) {
                       $item_sizes = $request->add_product_sizes[$i];
                       if (!in_array($item_sizes, array_values($s_n))) {
                           $size = new Products_sizes();
                           $size->name = $request->add_product_sizes[$i];
                           $size->product_id = $request->product_id;
                           $size->save();
                       }
                   }

               }else {
                   for ($i = 0; $i < count($request->add_product_sizes); $i++) {
                       $size = new Products_sizes();
                       $size->name = $request->add_product_sizes[$i];
                       $size->product_id = $request->product_id;
                       $size->save();
                   }
               }
           }

           if ($request->add_product_lengths){
               $l_n = [];
               $lengts = Products_lengths::where('product_id', $request->product_id)->get();
               if (count($lengts) > 0) {
                   foreach ($lengts as $key)
                   {
                       $l_n[] = $key->name;
                   }
                   for ($i = 0; $i < count($request->add_product_lengths); $i++) {
                       $item_lengths = $request->add_product_lengths[$i];
                       if (!in_array($item_lengths, array_values($l_n))) {
                           $size = new Products_lengths();
                           $size->name = $request->add_product_lengths[$i];
                           $size->product_id = $request->product_id;
                           $size->save();
                       }
                   }

               }else {
                   for ($i = 0; $i < count($request->add_product_lengths); $i++) {
                       $size = new Products_lengths();
                       $size->name = $request->add_product_lengths[$i];
                       $size->product_id = $request->product_id;
                       $size->save();
                   }
               }
           }


           if ($request->add_product_colors){
               $l_n = [];
               $colors = Products_colors::where('product_id', $request->product_id)->get();
               if (count($colors) > 0) {
                   foreach ($colors as $key)
                   {
                       $c_n[] = $key->name;
                   }
                   for ($i = 0; $i < count($request->add_product_colors); $i++) {
                       $item_colors = $request->add_product_colors[$i];
                       if (!in_array($item_colors, array_values($c_n))) {
                           $size = new Products_colors();
                           $size->name = $request->add_product_colors[$i];
                           $size->product_id = $request->product_id;
                           $size->save();
                       }
                   }

               }else {
                   for ($i = 0; $i < count($request->add_product_colors); $i++) {
                       $size = new Products_colors();
                       $size->name = $request->add_product_colors[$i];
                       $size->product_id = $request->product_id;
                       $size->save();
                   }
               }
           }
           $data_product = Products::where('id',$request->product_id)->with('ProductPhoto')->get();
           return response()->json(['product'=>$data_product]);
       }

    }

    public function new_AddCart(Request $request){
        $arr = [];
        $sizes = 'null';
        $length = 'null';
        if ($request->product_color=='null'){
            $arr['color'] = '@ntreq guyn';
        }
        $data = Products::where('id',$request->product_id)
            ->with('ProductSiazes')
            ->with('ProductLengths')
            ->first();
        if (count($data->ProductSiazes) > 0)
        {
            if (!$request->product_sizes)
            {
                $arr['sizes'] = '@ntreq sizes';
            }
            else
            {
                $sizes = $request -> product_sizes;
            }
        }

        if(count($data->ProductLengths) > 0){
            if (!$request->product_lengths)
            {
                $arr['length'] = '@ntreq length';
            }
            else
            {
                $length = $request -> product_lengths;
            }
        }

        if (count($arr)>0)
        {
            return $arr;

        }
        else {
            $data = Products::where('id',$request->product_id)->first();
            $subtotal = $data->price*$request->product_count;
            $cart = new Cart();
            $cart->size = $sizes;
            $cart->length = $length;
            $cart->name = $request->product_name;
            $cart->subtotal = $subtotal;
            $cart->color = $request->product_color;
            $cart->price = $data->price;
            $cart->count = $request->product_count;
            $cart->images = $request->product_main_images;
            $cart->user_id = Session::get('id');
            $cart->product_id = $request->product_id;
            $cart->save();
        }
    }

    public function cartinputonchange(Request $request)
    {
        $data = Cart::where('id',$request->id)->first();
        $subtotal = $data->price*$request->count;
        Cart::where('id',$request->id) ->update(['count' => $request->count, 'subtotal' => $subtotal]);
    }

    public function new_AddWishlist(Request $request){
        $data_wishlist = Wishlist::where('product_id',$request->product_id)->get();

        if (count($data_wishlist) > 0)
        {
            Wishlist::where('product_id',$request->product_id)->delete();
            return true;
        }
        else
        {
            $wishlist= new Wishlist();
            $wishlist->name = $request->product_name;
            $wishlist->images = $request->product_main_images;
            $wishlist->user_id = Session::get('id');
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
            return false;
        }
    }

    public function add_wishlist(Request $request){
        $wishlist = new Wishlist();
        $wishlist ->user_id = Session::get('id');
        $wishlist -> product_id = $request->product_id;
        $wishlist -> save();
    }

    public function derr()
    {
        $data = Users::get();
        return response()->json([

            'users' => $data

        ], Response::HTTP_OK);
    }


    public function product_reviews(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'feedback' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json(['r_errors'=>$validator->errors()->all()]);
        }else {
            $data = Orders::where('user_id', Auth::id())->where('id', $request->orders_id)->get();
            Orders::where('user_id', Auth::id())->where('id', $request->orders_id)->update(['feedback' => $request->feedback]);

            if (count($data) == 0) {
                return response()->json('errors');
            }
        }
    }

}




