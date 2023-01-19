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
    <form action="" method="POST">
        @include('admin.alter')
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="menu" placeholder="Tên sản phẩm">
                @error('name')
                        <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="menu1">Tên danh mục</label>
              <select class="form-control" name="parent_id">
                  <option value="0">Quần nam</option>
                  <option value="1">Áo nam</option>
                  <option value="2">Quần nữ</option>
                  <option value="3">Áo nữ </option>
                  <option value="4">Váy nữ </option>
                  <option value="5">Giày thể thao </option>
              </select>
            </div>
            <div class="form-group">
                <label for="menu1">Mô tả ngắn</label>
                <textarea value="{{old('des')}}" name="des" class="form-control" >

                </textarea>
                @error('des')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="menu1">Mô tả chi tiết</label>
                <textarea value="{{old('content')}}" id="editor" name="content" class="form-control">


                </textarea>
                @error('content')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" id="active" type="radio" checked name="active">
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" id="noactive" type="radio" name="active">
                    <label class="form-check-label">Không </label>
                </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo mới sản phẩm</button>
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
