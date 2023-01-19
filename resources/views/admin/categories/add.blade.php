@extends('admin.main')

@section('content')
    <form action="" method="POST">
        @include('admin.alter')
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Loại hàng</label>
                <input type="text" name="name_cate" value="{{old('name_cate')}}" class="form-control" id="name_cate" placeholder="Tên loại hàng">
                @error('name')
                        <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo mới sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

