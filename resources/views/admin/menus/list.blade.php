@extends('admin.main')
@section('content')
    @include('admin.alter')
    @if(!$datas->isEmpty())
        <form class=" mt-5 mb-5" action="">
            <div class="row">
                <select class="form-control form-group mx-sm-3 mb-2 col-2" name="parent_id">
                    <option value="" >Tất cả </option>
                    <option value="0"  {{request()->parent_id == '0' ? 'selected':''}}>Quần nam</option>
                    <option value="1"  {{request()->parent_id == '1' ? 'selected':''}}>Áo nam</option>
                    <option value="2"  {{request()->parent_id == 2 ? 'selected':''}}>Quần nữ</option>
                    <option value="3"  {{request()->parent_id == 3 ? 'selected':''}}>Áo nữ</option>
                    <option value="4"  {{request()->parent_id == 4 ? 'selected':''}}>Váy nữ</option>
                    <option value="5"  {{request()->parent_id == 5 ? 'selected':''}}>Giày thể thao</option>
                </select>
                <div class="form-group mx-sm-3 mb-2 col-4">
                    <input name="name" value="{{request()->name}}" type="name" class="form-control" id="inputPassword2" placeholder="Tên danh mục">
                </div>
                <button type="submit" class="btn btn-primary mb-2 col-1">Search</button>
            </div>


        </form>
        <div class="d-flex justify-content-end">
            <div class="float-left d-flex">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Record/Pages</label>
                <select onchange="changePage(value,'{{route('admin.menus.getAll')}}')" class="form-control my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option  {{request()->rcOfPage == 5 ? "selected" : ""}} value="5"><a href="">5</a></option>

                    <option value="2" {{request()->rcOfPage == 2 ? "selected" : ""}}><a href="#">2</a></option>

                    <option value="10" {{request()->rcOfPage == 10 ? "selected" : ""}}><a href="">10</a></option>
                </select>
            </div>
        </div>
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
               aria-describedby="example2_info">
            <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Tên sản phẩm
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending">Mô tả
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Engine version: activate to sort column ascending">Thể loại
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Engine version: activate to sort column ascending">Update At
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">&nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                <tr class="even">
                    <td class="sorting_1 dtr-control">{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td class="col-5">{{$data->des}}</td>
                    <td class="text-danger">
                        @switch($data->parent_id)
                            @case(0)
                                Quần nam
                                @break
                            @case(1)
                                Áo nam
                                @break
                            @case(2)
                                Quần nữ
                                @break
                            @case(3)
                                Áo nữ
                                @break
                            @case(4)
                                Váy nữ
                                @break
                            @case(5)
                                Giày thể thao
                                @break
                            @default
                                Default case...
                        @endswitch
                    </td>
                    <td>{{$data->created_at-> format('H:i:s d-m-Y')}}</td>
                    <td class="text-center w-10">
                        <a href="{{route('edit',$data->id)}}">
                            <button class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        <a href="{{route('destroy',$data->id)}}">
                            <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>
                            <i class="fa-regular fa-eye"></i>
                        </a>

                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div class="d-flex justify-content-end">
{{--            {{ $datas->links() }}--}}
            {{$datas -> appends(request()->all())->links()}}
        </div>

    @else
        <a href="{{route('admin.menus.getAll')}}"><span> <i class="fa-solid fa-arrow-left"></i> Back</span></a>
        <h3 class="text-center text-danger mt-5">Không có sản phẩm nào</h3>
    @endif

@endsection


