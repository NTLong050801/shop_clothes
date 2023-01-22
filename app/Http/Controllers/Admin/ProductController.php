<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Http\Services\Menu\CategoryService;
use App\Http\Services\Menu\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
class ProductController extends Controller
{
    protected $productService ;
    protected $categoryService;
    public function __construct(ProductService $productService , CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $title = 'Danh sách sản phẩm';
       $categories = $this->categoryService->getAll([],10000);

        $products = $this->productService->getAll(10);
      //  dd($products[0]->categories[0]->name_cate);
        return view('admin.products.list',compact('title','products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $title = 'Thêm sản phẩm mới';
        $categories = $this->categoryService->getAll([],10000);

        return view('admin.products.add',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProductRequest $request)
    {
        //
        //validate

        $this->productService->store($request);
        Session::flash('success',"Thêm thành công");
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
        $product = $this->productService->findProduct($id);
        $product = $product[0];

        $title = "Chi tiết sản phẩm";
        return view('admin.products.show',compact('product','title'));
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
        $title = "Sửa Sản phẩm";
        $product = $this->productService->findProduct($id);
        $product = $product[0];
        $categories = $this->categoryService->getAll([],10000);
//dd($product[0]);
        return view('admin.products.edit',compact('product','categories','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProductRequest $request,Product $id)
    {
        //
        try {
            $id->name = (string) $request->input('name');
            $id->id_category = (integer) $request->input('id_category');
            $id->price_in = (integer) $request->input('price_in');
            $id->price_out = (integer) $request->input('price_out');
            $id->description = (string) $request->input('description');
            $id->updated_at->now();
            $id->fill($request->input());
            $id->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('admin.product.index');
        }catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->productService->destroy($id);
         return redirect()->back();

    }
}
