<?php

namespace App\Http\Services\Menu;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function getAll($filters = [], $rcOfPage)
    {
        //dd($filters);
        if(!empty($filters)){
            return Categories::orderByDesc('id')->where($filters)->paginate($rcOfPage)->withQueryString();

        }
        return Categories::orderByDesc('id')->paginate($rcOfPage)->withQueryString();
    }
    public function create($request){
        try {
            Categories::create([
                'name_cate' =>ucwords($request->input('name_cate')) ,
                'created_at' => now(),
                'updated_at' => now(),

            ]);
            Session::flash('success', 'Thêm loại hàng thành công');
        }catch (\Exception $err){
            Session::flash('error', $err->getMessage());
        }
        return true;
    }
}
