<?php

namespace App\Http\Services\Menu;

class UploadService
{
    public function store($request){

        if ($request->hasFile('file')) {
            try {
                //get teen file
                $name = $request->file('file')->getClientOriginalName();
                // Tên thư mục
                $pathFull = 'uploads/' . date("Y/m/d");
                // Lưu ảnh vào storage/app/public/upload/Y/M/D/$name
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                // trả về path lưu ảnh
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
