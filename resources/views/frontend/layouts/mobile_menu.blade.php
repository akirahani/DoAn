{{-- <script src="{{asset('assets3/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('assets3/js/header.js')}}"></script> --}}

<div class="mobile_menu_wrapper">
    <div class="mobile_menu">
        <div class="m_search" id="m_search"></div>
        <ul class="m_menu list-unstyled px-0 py-0">
            @foreach($menu as $val)
            <li>
                <div class="d-flex p-link-d">
                    <a class="flex-grow-1" href="{{$val->link}}">{{$val->title}}</a>
                    <span class="plus align-self-center"><i class="fa fa-plus"></i><i
                            class="fa fa-minus"></i></span>
                </div>
                <ul class="list-unstyled px-0 py-0 mx-0 my-0">
                    <li>
                        <div class="d-flex p-link-d">
                            <a class="flex-grow-1"
                                href="">
                            </a>
                            <span class="plus align-self-center"><i class="fa fa-plus">
                                </i><i class="fa fa-minus"></i>
                            </span>
                        </div>
                        <ul class="list-unstyled p-0 m-0">
                            <li>
                                <a href="#">
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
