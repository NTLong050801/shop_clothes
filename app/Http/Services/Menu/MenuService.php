<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService
{

    public function create($request)
    {
        try {
            //dd($request->input());

            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'des' => (string)$request->input('des'),
                'content' => (string)$request->input('content'),
                'active' => (int )$request->input('active'),
                'name' => (string)$request->input('name'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
//            Session::flash("success");
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return true;

    }

    public function getAll($filters = [], $rcOfPage)
    {
        //dd($filters);
        if(!empty($filters)){
            return Menu::orderByDesc('id')->where($filters)->paginate($rcOfPage)->withQueryString();

        }
       return Menu::orderByDesc('id')->paginate($rcOfPage)->withQueryString();
    }

    public function destroy($request)
    {
        $id = (int)$request->id;
        $menu = Menu::where('id', $id);
        if ($menu) {
            $menu->delete();
            Session::flash('success', 'Xóa sản phẩm thành công');
            return true;
        }
        Session::flash('error', 'Xóa sản phẩm thất bại');
        return false;
    }
    public  function findItem($request){
        return Menu::where('id',$request->id)->get();
    }
    public  function update($request){
        try{
            $menu = Menu::where('id',$request->id)->get()[0];
            $menu->fill($request->input());
            $menu->save();
            $menu->updated_at = now();
            Session::flash('success', 'Sửa danh mục thành công');
            return true;
        }catch (\Exception $err){
            Session::flash('success', 'Sửa danh mục thất bại');
        }
        return false;
    }
}
