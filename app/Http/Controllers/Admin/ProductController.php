<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Http\Services\Menu\CategoryService;
use App\Http\Services\Menu\ProductService;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Log;
use Str;

class ProductController extends Controller
{
    protected $productService ;
    protected $categoryService;
    public function __construct(ProductService $productService , CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {

        $title = 'Danh sách sản phẩm';
//        $categories = $this->categoryService->getAll([],10000);
        $categories = Categories::all();
        $products = $this->productService->getAll();
        return view('admin.products.list',compact('title','products','categories'));
    }


    public function create()
    {
        $title = 'Thêm sản phẩm mới';
        $categories = Categories::all();
        return view('admin.products.add',compact('title','categories'));
    }

    public function store(FormProductRequest $request)
    {
      if(Product::where('slug',Str::slug($request->input('name'), '-'))){
          Session::flash('success',"Sản phẩm đã tồn tại");
          return redirect()->back();
      }
        $this->productService->store($request);
        Session::flash('success',"Thêm thành công");
        return redirect()->back();
    }

    public function show($id)
    {
        $product = $this->productService->show($id);
        $title = "Chi tiết sản phẩm";
        return view('admin.products.show',compact('product','title'));
    }
    public function edit($id)
    {
        //
        $title = "Sửa Sản phẩm";
        $product = $this->productService->show($id);
        $categories = Categories::all();
        return view('admin.products.edit',compact('product','categories','title'));
    }
    public function update(FormProductRequest $request,Product $product)
    {
        try {
           $product->name = (string) $request->input('name');
           $product->id_category = (integer) $request->input('id_category');
           $product->price_in = (integer) $request->input('price_in');
           $product->price_out = (integer) $request->input('price_out');
           $product->description = (string) $request->input('description');
           $product->updated_at->now();
           $product->fill($request->input());
           $product->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('admin.product.index');
        }catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        Session::flash('success',"Xóa thành công");
        return redirect()->back();
    }
}
