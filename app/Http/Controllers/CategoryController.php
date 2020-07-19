<?php

namespace App\Http\Controllers;

use App\Products;
use App\Products_categories_admin;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Categories()
    {
        $data = Products_categories_admin::get();
        return response()->json($data);
    }

    public function category($name) {
        $data = Products::where('category',$name)
            ->orderByDesc('id')
            ->with('ProductSiazes')
            ->with('ProductLengths')
            ->with('ProductColors')
            ->get();
        return view('category')->with('products',$data);
    }
}
