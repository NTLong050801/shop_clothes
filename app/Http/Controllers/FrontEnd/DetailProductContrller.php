<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailProductContrller extends Controller
{
    //
    public function index($id , $id_cate){
        $product = Product::with('categories')->where('id',$id)->first();;
        $title = $product->name;
        $product_relates = Product::where('id_category',$id_cate)->limit(4)->get();
        $categories =  Categories::all();
       return view('frontend.detail',compact('title','product','categories','product_relates'));
    }
}
