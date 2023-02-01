<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEnd\DetailProductContrller;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\Users\UsersController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\CategoriesController;
use \App\Http\Controllers\FrontEnd\HomeController;
Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/{id}/{id_cate}/product',[DetailProductContrller::class,'index'])->name('detail');
Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::get('admin/users/logout',[LoginController::class,'logout'])->name('logout');
Route::post('admin/users/login/store',[LoginController::class,'store'])-> name('store_login');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/',[MainController::class,'index'])->middleware('auth')->name('admin');
        Route::get('main',[MainController::class,'index'])->middleware('auth')->name('admin.main');
        #menu
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'index'])->name('admin.menus.index');
            Route::post('add',[MenuController::class,'store'])->name('admin.menus.store');
            # list
            Route::get('list',[MenuController::class,'getAll'])->name('admin.menus.getAll');
            #delete
            Route::get('{id}/delete',[MenuController::class,'destroy'])->name('destroy');
            Route::get('{id}/edit',[MenuController::class,'edit'])->name('edit');
            Route::post('{id}/update',[MenuController::class,'update'])->name('admin.menus.update');
        });

        Route::prefix('users')->group(function (){
            Route::get('index',[UsersController::class,'index'])->name('admin.users.index');
            Route::get('create',[UsersController::class,'create'])->name('admin.users.create');
            Route::post('store',[UsersController::class,'store'])->name('admin.users.store');
            Route::get('{id}/edit',[UsersController::class,'edit'])->name('admin.users.edit');
        });
        Route::prefix('cate')->group(function (){
            Route::get('index',[CategoriesController::class,'index'])->name('admin.cate.index');
            Route::get('create',[CategoriesController::class,'create'])->name('admin.cate.create');
            Route::post('store',[CategoriesController::class,'store'])->name('admin.cate.store');
            Route::get('{id}/edit',[CategoriesController::class,'edit'])->name('admin.cate.edit');
            Route::post('{id}/update',[CategoriesController::class,'update'])->name('admin.cate.update');

            Route::get('{id}/delete',[CategoriesController::class,'destroy'])->name('admin.cate.destroy');
        });

        Route::prefix('product')->group(function (){
            Route::get('index',[ProductController::class,'index'])->name('admin.product.index');
            Route::get('create',[ProductController::class,'create'])->name('admin.product.create');
            Route::post('store',[ProductController::class,'store'])->name('admin.product.store');
            Route::get('{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
            Route::post('{id}/update',[ProductController::class,'update'])->name('admin.product.update');

            Route::get('{id}/delete',[ProductController::class,'destroy'])->name('admin.product.destroy');
            Route::get('{id}/show',[ProductController::class,'show'])->name('admin.product.show');
        });

        #upload admin
        Route::post('upload/services',[UploadController::class,'store'])->name('upload');
    });

});


