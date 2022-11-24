@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Sửa mã màu</h1>
    <div class="card">
        <div class="card-body">
            <!-- <div class="card-title">Round Vertical Form</div> -->
            <hr>
            <form action="{{url('/admin/paint/capnhat')}}" method="POST"  enctype="multipart/form-data" runat="server">
                @csrf
                <input type="text" value="{{$paint->id}}" name ="id" hidden>
                    <div class="mb-3">
                        <label for="input-6">Tên mã</label>
                        <input name="name" type="text" value="{{$paint->name}}"  class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-6">Tên màu</label>
                        <input name="ma" type="text"  class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Sản phẩm tương ứng</label>
                        <div class="product-checkcolor" style="display:grid;grid-template-columns: repeat(auto-fill, calc(33.33% - 5px));">
                        @foreach ($product as $item)
                            @php
                                if(!empty(json_decode($paint->product))){
                                    $arr_sp_check = json_decode($paint->product);
                                }else{
                                    $arr_sp_check = [];
                                }
                               
                            @endphp
                            @if(in_array($item->id,  $arr_sp_check ))
                                <div style="display:flex"><input type="checkbox" checked class="" value="{{$item->id}}" name="product[]"> <span style="padding-left:15px">{{$item->name}}</span></div>
                            @else
                            <div style="display:flex"><input type="checkbox" class="" value="{{$item->id}}" name="product[]"> <span style="padding-left:15px">{{$item->name}}</span></div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5"></i>
                        Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection