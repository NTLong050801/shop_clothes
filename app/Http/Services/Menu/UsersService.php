<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class UsersService
{
    public function store($request)
    {
        try {
            User::create([
                'name' => (string)$request->input('name'),
                'email' => (string)$request->input('email'),
                'password' => Hash::make((string)$request->input('password')),
                'thumb' => (string)$request->input('file')
            ]);
            Session::flash('success', 'Thêm users thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return true;
    }
    public function getAll($filters = [], $rcOfPage)
    {
        //dd($filters);
        if(!empty($filters)){

            return User::orderByDesc('id')->where($filters)->paginate($rcOfPage)->withQueryString();

        }

        return User::orderByDesc('id')->where('status',0)->paginate($rcOfPage)->withQueryString();
    }
}
