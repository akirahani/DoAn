@extends('frontend.index')
@section('content')
<style>
    @media all and (min-width: 0px) {
        .log-top {
            height: 37px;
            border-bottom: 1px solid #E0E0E0;
            margin: 40px 0 0 0
        }

        .log-top ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%
        }

        .log-top ul li {
            margin: 0 35px;
            width: auto;
            font-size: 18px;
            height: 100%;
            position: relative
        }

        .log-top ul li:first-child {
            margin-left: 0
        }

        .log-top ul li:last-child {
            margin-right: 0
        }

        .log-top ul li.active:after {
            width: 100%;
            display: block;
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            border-bottom: 2px solid #ED1B24
        }

        .log-top ul li a {
            text-decoration: none;
            color: #7F7F7F
        }

        .log-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 22px 11px 70px 11px;
            border-bottom: 1px solid #E7E7E7
        }

        .log-form input {
            font-family: "Arial";
            outline: none;
            font-size: 14px;
            border: none
        }

        .log-form .log-ten {
            width: 100%;
            height: 44px;
            background: #F9F9F9;
            border: 1px solid #F2F2F2;
            box-sizing: border-box;
            border-radius: 5px;
            padding: 0 15px;
            margin-bottom: 12px;
            transition: all .2s;
            color: #000
        }

        .log-form .select {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px
        }

        .log-form .select select {
            width: calc(50% - 9px);
            height: 44px;
            background: #F9F9F9;
            border: 1px solid #F2F2F2;
            box-sizing: border-box;
            border-radius: 5px;
            font-family: "Arial";
            outline: none;
            font-size: 14px;
            padding: 0 10px
        }

        .log-form .log-sub {
            width: 100%;
            height: 44px;
            background: linear-gradient(360deg, #FF6B00 0%, #FF9F73 90.7%);
            border: none;
            margin-bottom: 10px;
            outline: none;
            margin: 18px auto;
            border-radius: 10px;
            width: 100%;
            font-size: 18px;
            line-height: 21px;
            color: #F2F2F2;
            text-transform: uppercase
        }

        .log-form .log-sub:hover {
            background: #c23616;
            cursor: pointer
        }

        .log-form .log-facebook {
            background: #3B5999;
            border-radius: 5px;
            width: 100%;
            height: 44px;
            color: #FFF;
            border: none;
            display: flex
        }

        .log-form .log-facebook:hover {
            background: #273c75;
            cursor: pointer
        }

        .log-form .log-facebook span {
            height: 100%;
            display: flex;
            justify-content: center
        }

        .log-form .log-facebook span.icon {
            width: 56px;
            text-align: center;
            border-right: 1px solid #FFF;
            align-items: flex-end
        }

        .log-form .log-facebook span.icon img {
            display: block
        }

        .log-form .log-facebook span.text {
            width: calc(100% - 56px);
            text-align: center;
            align-items: center
        }

        .log-form .log-facebook span.text a {
            text-decoration: none;
            color: #FFF;
            font-size: 14px
        }

        p.log-mes {
            color: red;
            padding: 50px 0 0 0;
            text-transform: uppercase
        }

        p.log-mes a {
            text-decoration: none;
            color: #0066FF;
            font-weight: bold
        }

        p.log-access {
            font-size: 14px;
            line-height: 19px;
            text-align: justify
        }

        p.log-access a {
            text-decoration: none;
            color: #0066FF;
            font-weight: bold
        }
    }

    @media all and (min-width: 521px) {
        .log-top {
            width: 520px;
            margin: auto;
            margin-top: 40px
        }

        .log-form {
            width: 520px;
            margin: auto;
            padding-left: 0;
            padding-right: 0
        }

        .log-form form {
            width: 100%
        }
    }

    @media all and (min-width: 1201px) {
        nav {
            display: block
        }

        nav h2 {
            cursor: pointer
        }

        nav ul {
            display: none
        }

        .log-top {
            width: 457px
        }

        .log-form {
            width: 457px
        }
    }

    /*# sourceMappingURL=dang-nhap.css.map */
</style>
    <section class="log-top">
        <ul>
            <li><a href="login">Đăng nhập</a></li>
            <li class="active">Tạo tài khoản</li>
        </ul>
    </section>

    <section class="log-form">
        <form method="POST" action="{{url('/user/insert')}}" >
            @csrf
            <p>Tài khoản</p>
            <input class="log-ten" loai="taikhoan" type="text" name="username" placeholder="Tài khoản là bắt buộc" required
                autocomplete="off" value="<?php if (isset($_SESSION['dangkytaikhoan'])) {
                    echo $_SESSION['dangkytaikhoan'];
                } ?>" />
            <p>Mật khẩu</p>
            <input class="log-ten" type="password" name="password" placeholder="Mật khẩu là bắt buộc" required
                autocomplete="off" />
            <p>Email</p>
            <input class="log-ten" loai="email" type="email" name="email" placeholder="Email của bạn"
                autocomplete="off" value="<?php if (isset($_SESSION['dangkyemail'])) {
                    echo $_SESSION['dangkyemail'];
                } ?>" />
            <p>Tên</p>
            <input class="log-ten" loai="ten" type="text" name="fullname" placeholder="Tên là bắt buộc" required
                autocomplete="off" value="<?php if (isset($_SESSION['dangkytentaikhoan'])) {
                    echo $_SESSION['dangkytentaikhoan'];
                } ?>" />
            <p>Điện thoại</p>
            <input class="log-ten" loai="dienthoai" type="text" name="dienthoai" placeholder="Số điện thoại của bạn"
                required autocomplete="off" value="<?php if (isset($_SESSION['dangkydienthoai'])) {
                    echo $_SESSION['dangkydienthoai'];
                } ?>" />
            <p>Địa chỉ</p>
            <input class="log-ten" loai="diachi" type="text" name="diachi" placeholder="Địa chỉ của bạn" required
                autocomplete="off" value="<?php if (isset($_SESSION['dangkydiachi'])) {
                    echo $_SESSION['dangkydiachi'];
                } ?>" />
            <input class="log-sub" type="submit" name="dangky" value="Tạo tài khoản" />
        </form>
    </section>
@endsection
