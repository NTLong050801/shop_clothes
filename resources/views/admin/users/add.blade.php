@extends('admin.main');
@section('content')

    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.alter')
        <div class="card-body row">
            <div class="form-group col-4">
                <label for="name">Họ Tên</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Họ Tên">
                @error('name')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-8">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email">
                @error('email')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="password">PassWord</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Password">
                @error('password')
                <span class="text-danger ">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="email">Confirm PassWord</label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="password" placeholder="Confirm PassWord">
                @error('password_confirmation')
                <span class="text-danger ">{{$message}}</span>
                @enderror
{{--                @if(Session::has('current_password'))--}}
{{--                    <span class="text-danger ">--}}
{{--                            {{Session::get('current_password')}}--}}
{{--                   </span>--}}
{{--                @endif--}}
            </div>
            <div class="form-group col-12">
                <lable for="avatar">Ảnh đại diện</lable>
                <input type="file" class="form-group" name="image" id="image" url="{{route('upload')}}"  >
                @error('image')
                <span class="text-danger ">{{$message}}</span>
                @enderror
                <div id="img_show" class="mt-3">

                </div>
                <input type="hidden" name="file" id="file" value="/storage/uploads/avartar.jpg"  >
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        </div>
        @csrf
    </form>
@endsection
