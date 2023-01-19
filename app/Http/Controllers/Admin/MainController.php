<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $title = "Trang quản trị admin";
        $datas = [];
        return view('admin.home',compact('title','datas'));
    }
}
