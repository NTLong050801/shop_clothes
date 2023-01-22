@extends('admin.main')
@section('content')
    @include('admin.alter')
    @if(!$products->isEmpty())
        <form class=" mt-5 mb-5" action="">
            <div class="row">
                <select class="form-control form-group mx-sm-3 mb-2 col-2" name="parent_id">
                    <option value="" >Tất cả </option>
                    @foreach($categories as $category){
                    <option value="{{$category->id}}" }>{{$category->name_cate}}</option>
                    @endforeach
                </select>
                <div class="form-group mx-sm-3 mb-2 col-4">
                    <input name="name" value="{{request()->name}}" type="name" class="form-control" id="inputPassword2" placeholder="Tên danh mục">
                </div>
                <button type="submit" class="btn btn-primary mb-2 col-1">Search</button>
            </div>


        </form>

        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
               aria-describedby="example2_info">
            <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Tên sản phẩm
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending">Giá nhập
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending">Giá Bán
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Engine version: activate to sort column ascending">Loại hàng
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
            <?php
                $index = 1;
            ?>
            @foreach($products as $data)
                <tr class="even">
                    <td class="sorting_1 dtr-control">{{$index++}}</td>
                    <td>
                        <a href="{{$data->thumb}}" target="_blank">
                            <img src="{{$data->thumb}}" alt="" class="img-fluid" width="100px" >
                        </a>
                        {{$data->name}}

                    </td>
                    <td class="col-1">{{$data->price_in}}</td>
                    <td class="col-1">{{$data->price_out}}</td>
                    <td class="text-danger">
                      {{$data -> categories[0]->name_cate}}
                    </td>
                    <td>{{$data->updated_at->format('H:i:s d-m-Y')}}</td>
                    <td class="text-center w-10">
                        <a href="{{route('admin.product.edit',$data->id)}}">
                            <button class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        <a href="{{route('admin.product.destroy',$data->id)}}">
                            <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>
                        </a>
                        <a href="{{route('admin.product.show',$data->id)}}">
                            <button class="btn btn-sm btn-primary "><i class="fa-regular fa-eye"></i></button>

                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div class="d-flex justify-content-end">
            {{ $products->links() }}
{{--            {{$products -> appends(request()->all())->links()}}--}}
        </div>

    @else
        <a href="{{route('admin.product.create')}}"><span> <i class="fa-solid fa-arrow-left"></i> Back</span></a>
        <div class="text-center">
            <h3 class="text-center text-danger mt-5">Không có sản phẩm nào</h3>
            <a href="{{route('admin.product.create')}}" class="mt-5">
                <buton class="btn btn-info">Thêm sản phẩm</buton>
            </a>
        </div>
    @endif

@endsection


