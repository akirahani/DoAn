@extends('backend.layouts.index')
@section('content')
<div class="all_config_web_detail row">
    <table class="table">
        <thead class="table-dark border mx-auto">
            <tr >
                <th>Tên</th>
                <th>Logo</th>
                <th>Favicon</th>
                <th>Address</th>
                <th>Tel</th>
                <th>Description</th>
                <th>Sub_Description</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Twitter</th>
                <th>Tác vụ</th>

            </tr>
        </thead>
        <tbody>
            @foreach($config as $val)
            <tr class="mx-auto">
                <td scope="row">{{$val->name}}</td>
                <td><img src="/assets/image/config/logo/{{$val->logo}}" alt="" style="width:50%"></td>
                <td><img src="/assets/image/config/favicon/{{$val->favicon}}" alt="" style="width:50%"></td>
                <td>{{$val->address}}</td>
                <td>{{$val->tel}}</td>
                <td>{{$val->description}}</td>
                <td>{{$val->sub_description}}</td>
                <td>{{$val->facebook}}</td>
                <td>{{$val->instagram}}</td>
                <td>{{$val->twitter}}</td>
                <td><a href="{{url('/admin/config/edit',$val->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection