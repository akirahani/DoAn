@extends('backend.layouts.index')
@section('content')
@php

@endphp
   
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Đơn hàng</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{$count_new}}">{{$count_new}}</span>
                                </h4>
                            </div>

                            <div class="col-6">
                                <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Vốn đầu tư</span>
                                <h4 class="mb-3">
                                    <span ><p><?=number_format($total_budget,0,'.','.')?>đ</p></span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block " style="white-space: nowrap">Doanh số bán hàng</span>
                                <h4 class="mb-3">
                                    <span ><?=number_format($gia_tong,0,'.','.')?></span>đ
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->


            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Đơn hoàn thành</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{$count_finish}}">{{$count_finish}}</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>

            
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Tiền nợ</span>
                                <h4 class="mb-3">
                                    <span >{{number_format($all_no_ncc,0,'.','.')}}</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Đơn hủy</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{$count_cancel}}">{{$count_cancel}}</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">+2.95%</span>
                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Đơn đang giao</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{$count_delivery}}">{{$count_delivery}}</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Đơn đang gọi</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{$count_call}}">{{$count_call}}</span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
        </div><!-- end row-->
        <div>
            <?php 
                
                $arr_sp = [];
                $product =  DB::table('products')->select('id','name')->get();
                foreach($product as $val){
                    $arr_sp[$val->id]['ten'] = $val->name;
                    $sanpham_ban_chay = DB::table('order_products')->select('product_id','quantity','order_id')->where('product_id','=',$val->id)->get();
                    if(!empty($sanpham_ban_chay)){
                        $tong_sl_sp = 0;
                        foreach($sanpham_ban_chay as $valb_seller){
                            if(!empty($donhang_status)){
                                $donhang_status = DB::table('orders')->select('status')->where('id','=',$valb_seller->order_id)->first();
                                if($donhang_status->status == 4){
                                    $tong_sl_sp += $valb_seller->quantity;
                                }
                            }
                       
                        }
                        if( $tong_sl_sp >0){
                            $arr_sp[$val->id]['soluong'] = $tong_sl_sp;
                        }else{
                            unset($arr_sp[$val->id]);
                        }
                    }
                }
                $arr_sort =[];
                foreach ($arr_sp as $key => $row_sort)
                {
                    $arr_sort[$key] = $row_sort['soluong'];
                }
                $arr_final = array_multisort($arr_sort, SORT_DESC, $arr_sp);
            ?>
            <table class="table">
                <h3>Sản phẩm bán chạy</h3>
                <tr>
                    {{-- <th>STT</th> --}}
                    <th>Sản phẩm</th>
                    <th>Số lượng bán ra</th>
                </tr>
                <?php foreach($arr_sp as $key => $val_spbanchay){ $a = array_keys($arr_sp);?>
                <tr>
                    <td><?=$val_spbanchay['ten']?></td>
                    <td><?=$val_spbanchay['soluong']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
@endsection
