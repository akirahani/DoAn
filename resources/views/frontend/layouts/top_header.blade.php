<div class="config-web">
    <div class="top-header" style="background-color: #081356">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-9 col-xm-9 col-10 text-left">
                    <select name="search_category_id" id="search_category_id" class="custom-select" hidden="">
                        <option value="0">Tất cả danh mục</option>
                    </select>
                    <div id="search">
                        <span class="button-search"><i class="fa fa-search" style="color:#fff"></i></span>
                        <input type="text" name="search" class="search_input form-control form-control-sm"
                            placeholder="Tìm kiếm" value="">
                    </div>
                </div>

                <div class="col-xl-8 col-lg-9 col-md-9 d-none d-md-block text-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="top-link"><i class="fa fa-map-marker mr-2"></i>{{$config->address}}</a>
                        </li>
                        {{-- <li class="list-inline-item">
                            <a href="#" class="top-link"> <i class="fa fa-sign-in mr-2"></i>Đăng ký Nhà Phân
                                Phối</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="top-link"><i class="fa fa-paint-brush mr-2"></i>Quạt màu</a>
                        </li> --}}
                        <li class="list-inline-item hotline_top">
                            <a href="tel:0977120388" class="top-link" style="color:#fff"><i
                                    class="fa fa-phone animated infinite tada  mr-2" style="color:#fff"></i>{{$config->tel}}
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
