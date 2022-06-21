<!DOCTYPE html>
<head>
   @include('frontend.layouts.asset')
</head>
<body>
    <style>
        .lazy {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            justify-content: center;
            align-items: center;
            background: rgba(0,0,0,0.34);
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
        /* .lazy-loaded {
            background-image: none;
        } */
    </style>
    <div id="all-wrapper-ui">
        <div class="all-wrapper-header">
            @include('frontend.layouts.header')
        </div>
        <div class="all-wrapper-content">
            <div class="main-content" >
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
    <img class="lazy" src="{{asset('upload/vuong.svg')}}" data-src="{{asset('upload/vuong.svg')}}" />
</body>
<script>
    $(function(){
        $("img.lazy").lazyload({
            threshold: 200,
            event : "click"
        });
    });
</script>

</html>
