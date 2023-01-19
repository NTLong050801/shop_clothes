<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
class MenuController extends Controller
{
    //
    protected $menuService;
    protected $rcOfPage = 5 ;
    public  function  __construct(MenuService $menuService)
    {
        $this -> menuService = $menuService;
    }

    public  function index(){
        $title = 'Thêm sản phẩm mới';
        return view('admin.menus.add',compact('title'));
    }
    public function store(CreateFormRequest $request){
//        dd($request->input());
        $result = $this-> menuService->create($request);
        return redirect()->back();
    }
    public  function  getAll(Request $request){
        $title = "Danh sách sản phẩm";
        $filters = [];
        // echo $request->rcOfPage;
//        $rcOfPage = $request->rcOfPage ?? 5 ;
        if(isset($_GET['rcOfPage'])){
            $this->rcOfPage = $_GET['rcOfPage'];
        }
        if(!empty($request->parent_id)  ){
            $parent_id = $request->parent_id;
          //  echo $parent_id;
            $filters[] = [
                'parent_id' ,'=',$parent_id
            ];
        }
        if($request->parent_id == '0' ){
            $parent_id = $request->parent_id;
            //  echo $parent_id;
            $filters[] = [
                'parent_id' ,'=',$parent_id
            ];
        }
        if(!empty($request->name)){
            $name = $request->name;
            $filters[] = [
                'name', 'like' , '%'.$name.'%'
            ];
        }
        $datas = $this->menuService->getAll($filters ,   $this->rcOfPage);

        return view('admin.menus.list',compact('title','datas'));
    }

    public function destroy(Request $request){
      $result = $this->menuService->destroy($request);
      if($result == true){
         return redirect() -> back();
      }
      return redirect() -> back();
    }
    public function edit(Request $request){
        $datas = $this-> menuService -> findItem($request);
        $datas = $datas[0];
        $title = "Update sản phẩm";

        return view('admin.menus.edit',compact('datas','title'));
    }
    public  function update(Request $request){
        //  dd($request);
        $result = $this->menuService -> update($request);
        if($result == true){
            return redirect() -> route('admin.menus.getAll');
        }
        return redirect() -> back();
    }
}
