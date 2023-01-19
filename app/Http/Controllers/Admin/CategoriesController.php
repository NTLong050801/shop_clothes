<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CategoryService;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    protected $cateService;
    protected $rcOfPage = 5 ;
    public  function  __construct(CategoryService $cateService)
    {
        $this -> cateService = $cateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $title = "Loại hàng";
        $datas = $this->cateService->getAll([],$this->rcOfPage);
        return view('admin.categories.list',compact('title','datas'));

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
        //
        $this->validate($request, [
            'name_cate' => 'required|min:4|unique:categories',
        ],[
            'required' => 'Vui lòng nhập tên loại hàng',
            'min' => 'Tên loại hàng ít nhất là :min ký tự',
            'unique' => 'Tên loại hàng đã tồn tại'
        ]);

        $result = $this->cateService->create($request);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = (int)$request->id;
        $cate = Categories::where('id', $id);
        if ($cate) {
            $cate->delete();
            Session::flash('success', 'Xóa sản phẩm thành công');
            return redirect()->back();
        }
        Session::flash('error', 'Xóa sản phẩm thất bại');
        return redirect()->back();
    }
}
