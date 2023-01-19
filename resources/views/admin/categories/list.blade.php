@extends('admin.main')
@section('content')
    @include('admin.alter')
    <div class="btn btn-success" data-toggle="modal" data-target="#addLoaihang"> Thêm loại hàng</div>
    <div class="modal fade" id="addLoaihang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('admin.cate.store')}}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm loại hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name_cate" value="{{old('name_cate')}}" class="form-control" placeholder="Tên Loại hàng">
                        @error('name_cate')
                        <div class="mt-2">
                            <span class="text-danger mt-5">{{ $message }}</span>
                        </div>

                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" >Thêm Loại Hàng</button>
                    </div>
                </div>
                @csrf
            </form>

        </div>
    </div>
    @if(!$datas->isEmpty())
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Loại Hàng</th>
                <th scope="col">Update At</th>
                <th scope="col">#</th>

            </tr>
            </thead>
            <tbody>
{{--            @foreach($datas as $data)--}}
{{--                <tr>--}}
{{--                    <th scope="row">1</th>--}}
{{--                    <td>{{$data->name_cate}}</td>--}}
{{--                    <td>{{$data->updated_at-> format('H:i:s d-m-Y')}}</td>--}}
{{--                    <td class="text-center w-10">--}}
{{--                        <a href="{{route('edit',$data->id)}}">--}}
{{--                            <button class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>--}}
{{--                        </a>--}}
{{--                        <a href="{{route('destroy',$data->id)}}">--}}
{{--                            <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>--}}
{{--                        </a>--}}

{{--                    </td>--}}

{{--                </tr>--}}

{{--            @endforeach--}}


            {!!   \App\Helpers\Helper::listCate($datas)!!}
        </table>


    @else

        <h3 class="text-center text-danger mt-5">Không có Loại hàng nào</h3>
    @endif

@endsection


