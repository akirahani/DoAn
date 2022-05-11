<!DOCTYPE html>
<head>
   @include('frontend.layouts.asset')
</head>
<body>
    <div id="all-wrapper-ui">
        <div class="all-wrapper-header">
            @include('frontend.layouts.header')
        </div>
        <div class="all-wrapper-content">
            <div class="main-content">
              @yield('content')
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
