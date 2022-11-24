@extends('backend.layouts.index')
@section('content')
<div class="head-start-paint mb-3">
    <h1>Danh sách tin tức</h1>
    <hr>
    <a href="{{url('/admin/paint/add')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>

    <div class="detail-main-paint">
        <table class="table ">
            <thead class="table-dark">
                <tr>
                    <th style="width:20%" scope="col">STT</th>
                    <th style="width:20%" scope="col">Mã màu</th>
                    <th style="width:20%" scope="col">Màu</th>
                    <th style="width:20%" scope="col">Tên</th>
                    <th scope="col" style="width:20%">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($paint as $key=>$val){
                    $key++;
                ?>
                
                <tr id="paint{{$val->id}}">
                    <td style="width:20%" scope="row">{{$key}}</td>  
                    <td style="width:20%" scope="row" ><div class=""></div id="content">{{$val->name}}</div></td>
                    <td style="width:20%; background-color: {{$val->name}}" scope="row"></td>
                    <td style="width:20%; "scope="row">{{$val->ma}}</td>
                    <td style="width:20%" scope="row">
                        <a href="{{url('/admin/paint/edit',$val['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a data-id="{{$val->id}}" class="btn btn-danger del"  ><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                </tbody>
                <?php }?>
        </table>
     
        {{$paint->links()}}
    </div>
 
</div>
<script>

        $('.del').click(function(){
            const id = $(this).data('id');
            var cfrm = confirm("Bạn có chắc chắn muốn xóa ?");
                if(cfrm == true){  
                    $.ajax({
                        type:"GET",
                        url: "/admin/paint/delete/"+id,
                        data: {
                            'id': id
                        },
                        success:function(data){
                            $('#paint'+id).remove();
                        }

                    });
            }
        });
</script>
@endsection