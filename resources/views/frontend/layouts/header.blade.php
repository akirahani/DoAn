@include('frontend.layouts.top_header')
<div class="header-main ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="d-lg-none col-md-2  col-2 col-trigger">
                <div class="d-lg-none mobile_menu_trigger">
                    <div class="nav-icon">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2  col-5 col-logo text-left">
                <div class="wt-logo  text-left">
                    <div class="logo  text-left">
                        <a href="{{ url('/') }}">
                            <img src="./assets/image/config/logo/{{ $config->logo }}" title="CÔNG TY SƠN SÁU ĐÀ NẴNG"
                                alt="CÔNG TY SƠN SÁU ĐÀ NẴNG" style="width:100px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 d-none d-lg-block col-menu mb-4">
                <div class="wap-menu d-none d-lg-block">
                    <div id="menu">

                        <ul class="list-inline">

                            @foreach ($menu as $val)
                                <li class="list-inline-item withsubs">
                                    <a href="{{ $val->link }}">{{ $val->title }}</a>
                                    <div class="menu-drop-down">
                                        <ul>
                                            <li class="text-uppercase">
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 ml-4">
                <div class="cart-and-login" >
                    <ul class="list-inline-doing mt-4">
                      
                        <li class="user-login ml-3 ">
                            <a href="">
                                <i class="fas fa-user" style="font-size: 28px; color:orange"></i>
                            </a>
                        </li>
                        <li class="cart-icon ml-3">
                            <a href="">
                                <i class="fas fa-cart-shopping" style="font-size: 28px; color:orange"></i>
                            </a>    
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
      let cl =  document.querySelector('.nav-icon');
        cl.addEventListener("click",()=>{
            console.log('a');
        })
    </script> --}}
    @include('frontend.layouts.mobile_menu')
</div>

