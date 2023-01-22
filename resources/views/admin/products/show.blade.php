@extends('admin.main')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @include('admin.alter')
        <div class="card-body row">
            <div class="form-group col-6">
                <label for="menu">Tên sản phẩm</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="menu"
                       placeholder="Tên sản phẩm" readonly>
            </div>
            <div class="form-group col-6">
                <label for="menu1">Tên danh mục</label>
                <select class="form-control" name="id_category" readonly>
                    <option value="{{$product->id_category}}">
                        {{$product->categories[0]->name_cate}}
                    </option>

                </select>
            </div>
            <div class="form-group col-6">
                <label for="price_in">Giá nhập</label>
                <input type="number" min="0" class="form-control" value="{{$product->price_in}}" name="price_in"
                       id="price_in" readonly>

            </div>
            <div class="form-group col-6">
                <label for="price_out">Giá bán</label>
                <input type="number" min="0" class="form-control" value="{{$product->price_out}}" name="price_out"
                       id="price_out" readonly>
                @error('price_out')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="description">Mô tả chi tiết</label>
    {!!   $product->description !!}


            </div>
            <div class="form-group col-12">
                <lable for="image">Ảnh đại diện</lable>
                <div id="img_show" class="mt-3">
                    <a href="{{$product->thumb}}" target="_blank"><img src="{{$product->thumb}}" class="img-fluid" alt=""></a>
                </div>
                <input type="hidden" name="file" id="file" value="{{$product->thumb}}">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{route('admin.product.edit',$product->id)}}">
                <button type="button" class="btn btn-primary">Sửa sản phẩm này</button>
            </a>
        </div>
        @csrf
    </form>
@endsection

