<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu -->

            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- list-detail-1 --}}
                <li class="menu-title" data-key="t-menu">Thống kê</li>

                <li>
                    <a href="{{url('/admin/home')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                {{-- list-detail-2 --}}
                <li class="menu-title mt-2" data-key="t-components">Nghiệp vụ bán hàng</li>

                  {{-- product --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Sản phẩm</span>
                    </a>  
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{url('/admin/product')}}"  data-key="t-alerts">Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/category')}}">Loại sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/trademark')}}">Thương hiệu</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-components">Kho hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/storage/import')}}" data-key="t-alerts">Dữ liệu nhập hàng</a></li>
                        <li><a href="{{url('/admin/storage/export')}}" data-key="t-alerts">Dữ liệu xuất hàng</a></li>
                        {{-- <li><a href="{{url('/admin/storage')}}" data-key="t-alerts">Thống kê nhập xuất tồn đầu</a></li> --}}
                        {{-- <li><a href="{{url('/admin/storage')}}" data-key="t-alerts">Thống kê doanh thu</a></li> --}}
                        {{-- <li><a href="{{url('/admin/storage')}}" data-key="t-alerts">Thống kê số lượng hàng bán ra</a></li> --}}
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Đơn đặt hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/order')}}" data-key="t-alerts">Danh sách</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Extended</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                        <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="box"></i>
                        <span class="badge rounded-pill bg-soft-danger text-danger float-end">7</span>
                        <span data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                        <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                        <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                    </ul>
                </li> --}}
                {{-- list-detail-2 --}}
                <li class="menu-title" data-key="t-menu">Nhân sự</li>

                <li>
                    <a  href="{{url('/admin/account')}}">
                        <i data-feather="users"></i>
                        <span data-key="t-dashboard">Tài khoản</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Phân quyền</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/role')}}" data-key="t-starter-page">Danh sách</a></li>
                        <li><a href="{{url('/admin/permission/add')}}" data-key="t-maintenance">Thêm quyền</a></li>
                    </ul>
                </li>
                 {{-- list-detail-3 --}}
                <li class="menu-title" data-key="t-menu">Khác</li>
                <li>
                    <a href="{{url('/admin/news')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Tin tức <i class="fa fa-weibo" aria-hidden="true"></i></span>
                    </a>
        
                </li>
                <li>
                    <a href="{{url('/admin/config')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Cấu hình <i class="fa fa-weibo" aria-hidden="true"></i></span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/navbar')}}" >
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Danh mục web</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
