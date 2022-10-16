@extends('backend.layouts.index')
@section('content')
    <div class="head-start-account mb-3">
        <h1>Khách cần tư vấn</h1>
    </div>
    <div class="detail-main-product">
            <table class="table ">
                <thead class="table-dark">
                    <tr >
                        <th  scope="col">STT</th>
                        <th  scope="col">Tên khách</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">SĐT</th>
                        <th  scope="col">Trạng thái</th>
                        <th scope="col">Người tư vấn</th>
                    </tr>
                </thead>
            <tbody>
                <?php $sanpham_tuvan = DB::table('products')->get();
                    
                    $arr_sp = [];
                    foreach($sanpham_tuvan as $key =>$val_sp){
                        $arr_sp[$val_sp->id] = $val_sp->name;
                    }

                ?>
                @foreach($order as $key=>$val)
                <?php $khach_tv = DB::table('users')->select('id')->where('phone','=',$val->tel)->get();
                ?>
                <tr id="order{{$val->id}}">
                    <td  scope="row">{{$key+1}}</td>
                    <td  scope="row"><a href="customer/edit/{{$khach_tv[$key]->id}}">{{$val->name}}</a></td>
                    <td  scope="row">{{$arr_sp[$val->sanphamtuvan]}}</td>
                    <td  scope="row">{{$val->tel}}</td>
                    <td  scope="row">
                        <?php if($val->status ==1){
                            echo '<div style="color: orange">Đang chờ tư vấn</div>';
                        }else{
                            echo '<div style="color: green">Đã tư vấn</div>';
                        } ?>
                    </td>
                    <?php $nguoituvan = Session::get('acc');?>
                    <td  scope="row"><button donhang="{{$val->id}}" khach="{{$khach_tv[$key]->id}}"  sanpham="{{$val->sanphamtuvan}}" nguoituvan="{{$nguoituvan[0]->id}}" class="btn btn-warning tuvan-khach"><i class="fa fa-edit"></i></button></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
  </body>
  <section class="modals" style="display:none; position: fixed; width: 100%; height: 100%; top:0; background: rgba(0,0,0,0.1);">
    <div class="close-modals" style=" background: #000;"><i class="fa-solid fa-home"></i></div>
        <form action="{{url('admin/tuvan/add')}}" method="POST">
            @csrf
            <div class="mb-3 mt-5" style=" background: #fff; margin-top: 20px;">
                <label for="input-7" style="margin-top: 50px;">Tư vấn</label>
                <textarea name="manual" id="editor" class="form-control"> </textarea>
                <input type="hidden" name="khach_tuvan" value="">
                <input type="hidden" name="nguoi_tuvan" value="">
                <input type="hidden" name="sanpham_tuvan" value="">
                <input type="hidden" name="id_tuvan" value="">
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round px-5"></i>
                    Tư vấn</button>
                </div>
            </div>
        </form>
  </section>
</html>
<script>
    $('.tuvan-khach').click(function(){
        let id_tuvan = $(this).attr('donhang');
        let khach = $(this).attr('khach');
        let sanpham = $(this).attr('sanpham');
        let nguoituvan =  $(this).attr('nguoituvan');
        $('.modals').show();
        $('input[name="khach_tuvan"]').val(khach);
        $('input[name="nguoi_tuvan"]').val(nguoituvan);
        $('input[name="sanpham_tuvan"]').val(sanpham);
        $('input[name="id_tuvan"]').val(id_tuvan);
    });
</script>
@endsection
