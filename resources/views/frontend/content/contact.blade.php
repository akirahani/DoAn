
<div class="main-contact">
    <div class="form-in-contact p-5 w-50 ml-5 mb-2">
        <h2 style="">Liên hệ với chúng tôi</h2>
        <p class="aligncenter"><i>
            Vui lòng chia sẻ thông tin chi tiết của bạn bên dưới và chúng tôi sẽ sớm liên hệ với bạn.</i>
        </p>
        <form action="" method="">
            <div class="flex-in row">
                <div class="input-form mb-3 p-3 col-12">
                    <input type="text" class="form-control" placeholder="Your Name" name="firstname">
                </div>

                <div class="input-form mb-3 p-3 col-12">
                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                </div>
            </div>
            <div class="input-form mb-3">
                <textarea name=""  class="form-control" rows="8" placeholder="Address" name="address" style="width:100%;"></textarea>
            </div>
            <input class="form-control button-submit-contact"  type="button" value="Gửi">
        </form>
    </div>
</div>  
<script>
        $('input[type="button"]').click(function(){
        let ten = $('input[name="firstname"]').val();
        let dienthoai = $('input[name="phone"]').val();
        let diachi = $('textarea').val();
        if(ten == ''){
            alert('Bạn chưa nhập tên');
        }
        else {
            if(dienthoai == ''){
                alert('Bạn chưa nhập điện thoại');
            }
            else{
                if(diachi == ''){
                    alert('Bạn chưa nhập địa chỉ');
                }
                else{
                    $(".lazy").css("display", "flex");
                    $.ajax({
                        method: "post",
                        data: {"_token": "{{ csrf_token() }}",ten: ten , dienthoai:dienthoai, diachi: diachi},
                        url: "{{url('/contact/sent')}}",
                        success:function(data){
         
                            $(".lazy").hide();
                            Swal.fire(
                                'THÀNH CÔNG!',
                                'Cảm ơn bạn, chúng tôi sẽ liên hệ với bạn sớm nhất !',
                                'success'
                            );
                            $('input[name="firstname"]').val('');
                            $('input[name="phone"]').val('');
                            $('textarea').val('');
                        }
                    })
                }
            }
        }
    });    
</script> 