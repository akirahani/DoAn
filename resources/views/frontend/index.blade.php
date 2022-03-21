<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" src="./assets/image/config/favicon/{{ $config->favicon }}">
    <title>Website Bán Sơn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" src="./assets/image/config/favicon/{{ $config->favicon }}">
    <link rel="stylesheet" href="{{ asset('assets3/css/config_web.css') }}">
    <link rel="stylesheet" href="{{ asset('assets3/css/header_main.css') }}">
    <script src="{{ asset('assets3/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets3/js/header.js') }}"></script>
    
</head>

<body>
    <div id="all-wrapper-ui">
        <div class="all-wrapper-header">
            @include('frontend.layouts.header')
        </div>
        <div class="all-wrapper-content">
            <div class="main-content">
                @include('frontend.content.product_hot')
                @include('frontend.content.trademark')
                @include('frontend.content.contact')
                @include('frontend.content.news')
            </div>
        </div>
        <div class="all-wrapper-footer">
            @include('frontend.layouts.footer')
        </div>
    </div>
    <script type="text/javascript"
    src="{{ asset('assets3/js/cdn.jsdelivr.net.npm.slick-carousel@1.8.1.slick.slick.min.js') }}"></script>
    
    <script type="text/javascript"
    src="{{ asset('assets3/js/slick-config.js') }}">
    </script>
</body>


</html>
