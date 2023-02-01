<?php

namespace App\Http\Services\Menu;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Str;

class ProductService
{
    public function getAll(){

        return Product::with('categories')->orderBy('id','desc')->paginate('10');
    }
    public function store($request){

       return Product::firstOrCreate([
           'slug' => Str::slug($request->input('name'), '-')
       ],[
            'name' => $request->input('name'),
            'price_in' => $request->input('price_in'),
            'price_out' => $request->input('price_out'),
            'description' => $request->input('description'),
            'thumb' => $request->input('file'),
            'id_category' => $request->input('id_category')
        ]);

    }
    public function destroy($id){
       $product =  Product::where('id',$id);
       if($product){
           $product->delete();
           Session::flash('success', 'Xóa sản phẩm thành công');
           return true;
       }
       Session::flash('success', 'Xóa sản phẩm thất bại');
       return  false;

    }
    public function show($id){
        return Product::with('categories')->where('id',$id)->first();
    }
}
