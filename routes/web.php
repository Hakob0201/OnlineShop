<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\TestTwo;
use Illuminate\Routing\RouteFileRegistrar;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('login');
});


Route::get('/registr','MainController@registr');
Route::get('/index', "MainController@index");
Route::get('/product/{category}/{id}', "ProductsController@show_products");
Route::get('/logout', "MainController@logout");
Route::get('/profile', "ProfilController@profile")->middleware('loginmidel');
Route::get('/profile/myshops/{id}', "ProfilController@myshops_users")->middleware('loginmidel');
Route::get('/profile/myshops/{id}/myorders', "ProfilController@myshops_myorders")->middleware('loginmidel');
Route::get('/profile/myshops/addproduct/{id}', "ProductsController@add_product")->middleware('loginmidel');
Route::get('/profil/myorders', "ProfilController@myorders")->middleware('loginmidel');
Route::get('/profil/add_scores', "MainController@add_scores");
Route::get('/verify/{hash}/{id}',"MainController@verify");
Route::get('/profil/settings', "ProfilController@settings");
Route::get('/{productcart}', "CartController@show_cart");
Route::get('/{productcart}/wishlist', "WishlistController@show_wishlist");
Route::get('/removeWishlist/{id}', "WishlistController@remove_wishlist");
Route::get('/removeCart/{id}', "CartController@remove_cart");
Route::post('/signup/registr',"MainController@addregistr");
Route::post('/forgot_password',"MainController@forgot_password");
Route::post('/confirmation_code',"MainController@confirmation_code");
Route::post('/appenddeliveryaddresses',"MainController@appenddeliveryaddresses");
Route::post('/neweditpassword',"MainController@neweditpassword");
Route::post('/neweditemail',"MainController@neweditemail");
Route::post('/newedit_email_user_confirmation',"MainController@newedit_email_user_confirmation");
Route::post('/newremovmyshop',"MainController@newremovmyshop");
Route::post('/AddMyShop',"MainController@AddMyShop");
Route::post('/PrintMyShop',"MainController@PrintMyShop");
Route::post('/PrintAdminCategoria',"MainController@PrintAdminCategoria");
Route::post('/Categories',"CategoryController@Categories");
Route::post('/PrintAdminCategoriaProduct',"ProductsController@PrintAdminCategoriaProduct");
Route::post('/PrintAdmincolorsProduct',"ProductsController@PrintAdmincolorProduct");
Route::post('/PrintAdminsizesProduct',"ProductsController@PrintAdminsizesProduct");
Route::post('/product_reviews',"ProductsController@product_reviews");
Route::post('/story_of_my_product',"ProductsController@story_of_my_product");
Route::post('/new_editProduct',"ProductsController@new_editProduct");
Route::post('/new_removeProduct',"ProductsController@my_product_delete");
Route::post('/PrintAdminlengthsProduct',"ProductsController@PrintAdminlengthsProduct");
Route::post('/new_AddProduct',"ProductsController@new_AddProduct");
Route::post('/new_AddWishlist',"ProductsController@new_AddWishlist");
Route::post('/new_AddCart',"ProductsController@new_AddCart");
Route::post('/cartinputonchange',"ProductsController@cartinputonchange");
Route::post('/UserInformation',"MainController@UserInformation");
Route::post('/log/in',"LoginController@LogIN");
Route::post('add_product', 'MainController@add_product');
Route::post('/Editpersonalinformation', 'MainController@Editpersonalinformation');





Route::post('add_product', 'MainController@add_product');





/////////////////////////////////////search//////////////////////////////////////////

Route::get('/category/{name}',"CategoryController@category");

//////////////////////////////////////////end search/////////////////////////////////







/////////////////////////////////////search//////////////////////////////////////////

Route::post('/search', 'SearchController@search')->name('search');

////////////////////////////////////////////end search/////////////////////////////////





//cardi hama toot//
Route::get('/card/stripe', 'PaymentController@stripe')->middleware('loginmidel');
Route::get('/card/stripe/{id}', 'PaymentController@stripethis')->middleware('loginmidel');

Route::post('/card/stripe', 'PaymentController@stripePost')->name('stripe.post')->middleware('loginmidel');











Route::get('/profil/admin','AdminController@index')->middleware('adminmidel');
Route::get('/profil/admin/{any}',"AdminController@index")->where('any','.*');
Route::post('/profil/admin','AdminController@derr')->middleware('adminmidel');
Route::post('/delete/user/admin',"AdminController@delet_user_admin")->middleware('adminmidel');
Route::post('/block/user/admin',"AdminController@block_user_admin")->middleware('adminmidel');
Route::post('/active/user/admin',"AdminController@active_user_admin")->middleware('adminmidel');
///////////////////////////admin sizes///////////////////////////////////
Route::post('/print/admin/sizes',"AdminController@print_sizes_admin")->middleware('adminmidel');
////////////////////////end admin sizes////////////////////////////////

///////////////////////////admin sizes///////////////////////////////////
Route::post('/delete/admin/size',"AdminController@delete_sizes_admin")->middleware('adminmidel');
////////////////////////end admin sizes////////////////////////////////

///////////////////////////admin add sizes///////////////////////////////////
Route::post('/add/admin/sizes',"AdminController@add_sizes_admin")->middleware('adminmidel');
////////////////////////end admin add sizes////////////////////////////////


///////////////////////////admin lengths///////////////////////////////////
Route::post('/print/admin/lengths',"AdminController@print_lengths_admin");
////////////////////////end admin lengths////////////////////////////////

///////////////////////////admin lengths///////////////////////////////////
Route::post('/delete/admin/length',"AdminController@delete_length_admin");
////////////////////////end admin lengths////////////////////////////////

///////////////////////////admin add lengths///////////////////////////////////
Route::post('/add/admin/length',"AdminController@add_length_admin");
////////////////////////end admin add lengths////////////////////////////////


///////////////////////////admin lengths///////////////////////////////////
Route::post('/print/admin/colors',"AdminController@print_colors_admin");
////////////////////////end admin lengths////////////////////////////////

///////////////////////////admin lengths///////////////////////////////////
Route::post('/delete/admin/color',"AdminController@delete_color_admin");
////////////////////////end admin lengths////////////////////////////////

///////////////////////////admin add lengths///////////////////////////////////
Route::post('/add/admin/color',"AdminController@add_color_admin");
////////////////////////end admin add lengths////////////////////////////////



///////////////////////////admin categories///////////////////////////////////
Route::post('/print/admin/categories',"AdminController@print_categories_admin");
////////////////////////end admin categories////////////////////////////////

///////////////////////////admin categories///////////////////////////////////
Route::post('/delete/admin/category',"AdminController@delete_category_admin");
////////////////////////end admin categories////////////////////////////////

///////////////////////////admin add categories///////////////////////////////////
Route::post('/add/admin/category',"AdminController@add_category_admin");
////////////////////////end admin add categories////////////////////////////////

///////////////////////////admin add inbox///////////////////////////////////
Route::post('/print/admin/inboxs',"AdminController@print_inbox_admin");
////////////////////////end admin add inbox////////////////////////////////

///////////////////////////admin print showmessage///////////////////////////////////
Route::post('/profil/admin/showmessage/{id}',"AdminController@print_showmessage_admin");
////////////////////////end admin print showmessage////////////////////////////////











///////////////////////////send message///////////////////////////////////
Route::post('/send_message',"MessageController@send_message");
////////////////////////end send message////////////////////////////////

Route::get('/profile/message','MessageController@show_message');
Route::get('/profile/message/{id}','MessageController@profil_show_message');

///////////////////////////send message///////////////////////////////////
Route::post('/print_message',"MessageController@print_message");
////////////////////////end send message////////////////////////////////





Route::get('/lang/{locale}','MainController@locale');

