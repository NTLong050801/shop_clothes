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
{{--   form_update--}}
        <div class="modal fade" id="editLoaiHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="form_edit" action="" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa tên loại hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="name_edit" name="name_cate" value="" class="form-control" placeholder="Tên Loại hàng">
                            @error('name_cate')
                            <div class="mt-2">
                                <span class="text-danger mt-5">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" >Update</button>
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

            {!!   \App\Helpers\Helper::listCate($datas)!!}
            </tbody>
        </table>


    @else

        <h3 class="text-center text-danger mt-5">Không có Loại hàng nào</h3>
    @endif

@endsection


