@extends('admin.main')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 150px;
        }
    </style>
@endsection
@section('content')
    <form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @include('admin.alter')
        <div class="card-body row">
            <div class="form-group col-6">
                <label for="menu">Tên sản phẩm</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="menu"
                       placeholder="Tên sản phẩm">
                @error('name')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="menu1">Tên danh mục</label>
                <select class="form-control" name="id_category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(($category->id) == ($product->id_category))
                            selected
                            @endif
                        >
                            {{$category->name_cate}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="price_in">Giá nhập</label>
                <input type="number" min="0" class="form-control" value="{{$product->price_in}}" name="price_in"
                       id="price_in">
                @error('price_in')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="price_out">Giá bán</label>
                <input type="number" min="0" class="form-control" value="{{$product->price_out}}" name="price_out"
                       id="price_out">
                @error('price_out')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="description">Mô tả chi tiết</label>
                <textarea value="{{old('description')}}" id="editor" name="description" class="form-control">

                    {{$product->description}}
                </textarea>
                @error('description')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <lable for="image">Ảnh đại diện</lable>
                <input type="file" value="{{$product->thumb}}" class="form-group col-12" name="image" id="image" url="{{route('upload')}}">
                @error('image')
                <span class="text-danger ">{{$message}}</span>
                @enderror
                <div id="img_show" class="mt-3">
                    <a href="{{$product->thumb}}" target="_blank"><img src="{{$product->thumb}}" class="img-fluid" alt=""></a>
                </div>
                <input type="hidden" name="file" id="file" value="{{$product->thumb}}">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
