<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" /> --}}
</head>
<body>
    <div class="col-lg-12">
        <div class="white_box mb_30">
            <div class="row justify-content-center" >
                
                <div class="col-lg-5">
                    <!-- sign_in  -->
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">Admin Login</h5>
                        </div>
                        <div class="image-logo p-4" style="background: #fff;">
                            {{-- <img src="{{asset('upload/img-frontend/logoweb.jpg')}}" alt="" style="width:100%; height:300px "> --}}
                        </div>
                        <div class="modal-body">
                            <form  method="POST" action="{{ route('admin.login') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                                </div>
                                <button class="btn_1 full_width text-center" type="submit">Đăng nhập</button>
                         
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>