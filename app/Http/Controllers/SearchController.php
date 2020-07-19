<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $data = Products::where('name','Like','%'.$request->search.'%')
            ->orderByDesc('id')
            ->with('ProductSiazes')
            ->with('ProductLengths')
            ->with('ProductColors')
            ->get();
        return view('search')->with('products',$data)->with('search_rezult',$request->search);;
    }
}
