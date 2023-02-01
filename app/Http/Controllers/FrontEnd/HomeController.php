<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CategoryService;
use App\Http\Services\Menu\ProductService;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryService , $productSerive ;
    public function __construct(CategoryService $categoryService , ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productSerive = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Shop Quần áo";
        $categories =  Categories::all();
        $products = Product::all();
        $products_new = Product::orderBy('id','desc')->limit(3)->get();
        $products_price = Product::orderBy('price_out','asc')->limit(3)->get();
        $products_good = Product::orderBy('id','asc')->limit(3)->get();
        return view('frontend.main',compact('title','categories','products','products_new','products_price','products_good'));
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
    public function destroy($id)
    {
        //
    }
}
