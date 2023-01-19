@extends('admin.main')
@section('content')
    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
           aria-describedby="example2_info">
        <thead>
        <tr>
            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                aria-label="Browser: activate to sort column ascending">Họ Tên
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="1"
                aria-label="Platform(s): activate to sort column ascending">Email
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                aria-label="Engine version: activate to sort column ascending">Create AT
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
                <td class="col-2">
                    <img src="{{$data->thumb}}" class="img-fluid" width="50px" alt="">
                    {{$data->name}}
                </td>
                <td class="col-5">{{$data->email}}</td>
                <td class="text-danger">
                    {{$data->created_at-> format('H:i:s d-m-Y')}}
                </td>
                <td>
                    {{$data->updated_at-> format('H:i:s d-m-Y')}}
                </td>
                <td class="text-center w-10">
                    <a href="{{route('admin.users.edit',$data->id)}}">
                        <button class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                    </a>
                    <a href="{{route('destroy',$data->id)}}">
                        <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>
                    </a>

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
