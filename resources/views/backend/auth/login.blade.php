<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" /> --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    {{-- <img src="{{  }}" alt=""> --}}
    <div class="login-box">
        <h2>Login</h2>
        <form action="{{route('admin.login')}}" method="POST" >
            @csrf
          <div class="user-box">
            <input type="text" name="email" required="" class="form-control">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="" class="form-control">
            <label>Mật khẩu</label>
          </div>
          <a href="">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" value="Đăng nhập" hidden>Đăng nhập  
          </a>
        </form>
      </div>
      

</body>
</html>