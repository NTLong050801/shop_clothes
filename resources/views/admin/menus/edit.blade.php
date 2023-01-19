@extends('admin.main');
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
@endsection
@section('content')
    <form action="{{route('admin.menus.update',$datas->id)}}" method="POST">
        @include('admin.alter')
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" name="name" value="{{$datas->name}}" class="form-control" id="menu"
                       placeholder="Enter Tên danh mục">
                @error('name')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="menu1">Tên danh cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0"
                            @if( $datas->parent_id == 0  )
                                selected
                        @endif
                    >Quần nam
                    </option>
                    <option value="1" @if( $datas->parent_id == 1  )
                        selected
                        @endif>Áo nam
                    </option>
                    <option value="2" @if( $datas->parent_id == 2 )
                        selected
                        @endif>Quần nữ
                    </option>
                    <option value="3" @if( $datas->parent_id == 3  )
                        selected
                        @endif>Áo nữ
                    </option>
                    <option value="4" @if( $datas->parent_id == 4  )
                        selected
                        @endif>Váy nữ
                    </option>
                    <option value="5" @if( $datas->parent_id == 5  )
                        selected
                        @endif>Giày thể thao
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="menu1">Mô tả ngắn</label>
                <textarea  name="des" class="form-control">
                {{$datas->des}}
                </textarea>
                @error('des')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="menu1">Mô tả chi tiết</label>
                <textarea  id="editor" name="content" class="form-control">

                {{$datas->content}}
                </textarea>
                @error('content')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" id="active" type="radio"  name="active"
                    @if($datas->active ==1)
                        checked
                    @endif
                    >
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" id="noactive" type="radio" name="active"
                           @if($datas->active ==0)
                               checked
                        @endif
                    >
                    <label class="form-check-label">Không </label>
                </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa</button>
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
