@extends('backend.layouts.index')
@section('content')
<div class="col-lg-12">
    <h1>Thêm mã màu</h1>
    <div class="card">
        <div class="card-body">
            <!-- <div class="card-title">Round Vertical Form</div> -->
            <hr>
            <form action="{{url('/admin/paint/insert')}}" method="POST"  enctype="multipart/form-data" runat="server">
                @csrf
                    <div class="mb-3">
                        <label for="input-6">Tên mã</label>
                        <input name="name" type="text"  class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-6">Tên màu</label>
                        <input name="ma" type="text"  class="form-control form-control-rounded" id="input-6" required>
                    </div>
                    <div class="mb-3">
                        <label for="input-7">Sản phẩm tương ứng</label>
                        <div class="product-checkcolor" style="display:grid;grid-template-columns: repeat(auto-fill, calc(33.33% - 5px));">
                        @foreach ($product as $item)
                            <div style="display:flex"><input type="checkbox" class="" value="{{$item->id}}" name="product[]"> <span style="padding-left:15px">{{$item->name}}</span></div>
                        @endforeach
                        </div>
                    </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5"></i>
                        Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection