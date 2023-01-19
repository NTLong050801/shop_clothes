<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Login Admin";
        return view('admin.users.login',compact('title'));
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()-> route('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ],[
            'email.required'=> 'Vui lòng điền email',
            'password.required' => 'Vui lòng điền mật khẩu',
        ]);

        $email = $request -> input('email');
        $password = $request -> input('password');
        $remember =$request->input('remember');

        if (Auth::attempt(['email' => $email, 'password' => $password , 'status' => 1], $remember)) {
            Session::flash('sucsses','Đăng nhập thành công !');
            return redirect()->route('admin');
        };
        Session::flash('error','Email hoặc password không chính xác');
        //$request->session()->flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
