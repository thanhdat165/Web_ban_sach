@extends('welcome')
@section('content')
@foreach($product as $key => $value)
<div>
    <div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
        <div class="inner position-relative text-center">
            <h1 class="cat-heading d-none d-md-block">{{$value->BookName}}</h1>
            <ul class="breadcrumb align-items-center justify-content-center m-0">
                <!-- <li class="home">
                        <a href="/" title="Mew BS">Trang chủ</a>						
                        <img src="#" alt="Mew BS">
                    </li>
                    <li>
                        <a href="#">Sách kĩ năng sống</a>						
                        <img src="#" alt="Mew BS">
                    </li> -->
                <li class="font-weight-bold"><span>{{$value->BookName}}</span></li>
                <li>
                </li>
            </ul>
        </div>
    </div>
</div>

<div>
    <div class="container">
        <div class="row clearfix border" style="position: relative">
            <div class="col-xl-9 col-lg-9 col-12 pt-4">
                <div class="row clearfix">
                    <div class="product-layout_col-left col-12 col-sm-12 col-md-5 col-lg-5 col-xl-6 mb-3 border">
                        <img src="{{asset('./../public/frontend/image/'.$value->Img)}}" width="100%">
                    </div>

                    <div class="product-layout_col-right col-12 col-sm-12 col-md-7 col-lg-7 col-xl-6 product-warp border">
                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{ csrf_field() }}
                            <h3 class="product-name font-weight-bold text-uppercase" name="bookname" value="{{$value->BookName}}">{{$value->BookName}}</h3>
                            <div class="product-info position-relative">
                                Tình trạng:
                                @if($value->Quantity == 0)
                                <span class="inventory_quantity text-danger">Hết hàng</span>
                                @else
                                <span class="inventory_quantity">Còn hàng</span>
                                @endif
                            </div>
                            <input name="book_id" type="hidden" value="{{$value->BookID}}"></input>
                            <input name="bookname" type="hidden" value="{{$value->BookName}}"></input>
                            <input name="old_price" type="hidden" value="{{$value->PriceUnit}}"></input>
                            <input name="new_price" type="hidden" value="{{$value->PriceSale}}"></input>
                            <div class="product-info position-relative">Tác giả: <span id="vendor">{{$value->AuthorName}}</span>
                            </div>
                            <div class="product-info position-relative mb-3">Loại: <span id="type">Kĩ năng</span></div>
                            <div class="product-summary border-top pt-3 mt-2 pb-3">
                                <p>{{$value->Introduction}}</p>
                            </div>
                            <div class="product-price font-weight-bold" >
                                <span class="special-price m-0">{{number_format($value->PriceUnit,0)}}₫</span>
                                <del class="old-price ml-2" >{{number_format($value->PriceSale)}}₫</del>
                            </div>
                            @if($value->Quantity > 0)
                            <div class="product-quantity d-sm-flex align-items-center clearfix">
                                <header class="font-weight-bold mb-2" style="min-width: 100px;">Số lượng:</header>
                                <div class="custom-btn-number border-0 d-flex">
                                    <button class="border rounded bg-white" onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) && qtypro > 1 ) result.value--;return false;" type="button">-</button>
                                    <button class="border rounded bg-white" onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">+</button>
                                    @if($value->Quantity > 20)
                                                
                                                    <input type="number" maxlength="2" name="quantity" min="1" max='20' value="1" class="form-control m-0 border rounded" style="width:95%" required>
                                                
                                                @else
                                                    <input type="number" maxlength="2" name="quantity" min="1" max='{{$value->Quantity}}' value="1" class="form-control m-0 border rounded" style="width:95%" required>
                                                @endif 
                                    <!-- <input type="number" maxlength="2" name="quantity" min="1" max='{{$value->Quantity}}' value="1" class="form-control prd_quantity border rounded" id="qtym" style="width:50%" required> -->
                                </div>
                            </div>
                            <div class="col-12 pt-2 pb-2">                               
                                <button type="submit" class="btn d-flex w-100 justify-content-center flex-row align-items-center rounded pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open text-uppercase font-weight-bold">
                                    Mua ngay
                                </button>                  
                            </div>
                            @endif
                        </form>
                    </div>

                    <div class="product-content border-top pt-4 mewcontent">
                        <h3 class="special-content_title font-weight-bold">Thông tin chi tiết</h3>
                        <div class=" position-relative rte">
                            <p><strong>{{$value->BookName}}</strong></p>
                            <p><br>
                                {{$value->Description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-12 border mt-4">
                <div class="row align-items-center msb mb-4 d-lg-block olp">
                    <div class="item_coupon col-12 col-sm-6 col-md-6 col-lg-12 col-xl-12 mb-2">
                        <div class="content o_1 text-center p-xl-2 p-lg-2 p-sm-3 p-2 my-1 d-flex flex-column align-items-center position-relative">
                            <h4 class="coupon-title mt-2 mb-2 text-capitalize line_1">MewBS100</h4>
                            <p class="desc"><b>Giảm ngay 100K</b> - Mã áp dụng cuối tuần thứ 7, CN</p>
                        </div>

                        <div class="content o_2 text-center p-xl-2 p-lg-2 p-sm-3 p-2 my-1 d-flex flex-column align-items-center position-relative">
                            <h4 class="coupon-title mt-2 mb-2 text-capitalize line_1">MewBS100</h4>
                            <p class="desc"><b>Giảm ngay 100K</b> - Mã áp dụng cuối tuần thứ 7, CN</p>
                        </div>

                        <div class="content o_3 text-center p-xl-2 p-lg-2 p-sm-3 p-2 my-1 d-flex flex-column align-items-center position-relative">
                            <h4 class="coupon-title mt-2 mb-2 text-capitalize line_1">MewBS100</h4>
                            <p class="desc"><b>Giảm ngay 100K</b> - Mã áp dụng cuối tuần thứ 7, CN</p>
                        </div>
                        <div class="content o_4 text-center p-xl-2 p-lg-2 p-sm-3 p-2 my-1 d-flex flex-column align-items-center position-relative">
                            <h4 class="coupon-title mt-2 mb-2 text-capitalize line_1">MewBS100</h4>
                            <p class="desc"><b>Giảm ngay 100K</b> - Mã áp dụng cuối tuần thứ 7, CN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="m_product col-12 mt-5 mb-5 border">
    <h2 class="title mb-4 mt-3 text-uppercase font-weight-bold text-center position-relative">
        <a class="position-relative" href="san-pham-noi-bat" title="Sản phẩm khác">Sản phẩm khác</a>
    </h2>

    <div>
        <div class="slideshow-container border">
            <div class="mySlides p-2" style="display: block;">
                <div class="slide-container">
                    @foreach($relate_product->slice(0, 5) as $key => $relates)
                    <div class="border zoom p-3 m-1 d-inline-flex position-relative modal-open border">
                        <div class="display_detail_image"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}"><img src="{{asset('./../public/frontend/image/'.$relates->Img)}}" class="img-fluid mb-2" width="223px" alt=""></a></div>
                        <div class="item-info-home position-absolute text-center ">
                            <h6 class="pt-1 modal-open d-block pb-0 mb-0" style="display: -webkit-box;">{{$relates->BookName}}</h6>
                            <div class="product-price-slibar">
                                <span class="special-price font-weight-bold">{{number_format($relates->PriceSale,0)}}₫</span>
                                <del class="old-price">{{number_format($relates->PriceUnit,0)}}₫</del>
                            </div>
                            <button class="btn action font-weight-bold d-inline-block position-relative mt-1 mb-2"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}">Chi tiết</a></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mySlides p-2" style="display: block;">
                <div class="slide-container">
                    @foreach($relate_product->slice(5, 10) as $key => $relates)
                    <div class="border zoom p-3 m-1 d-inline-flex position-relative modal-open border">
                        <div class="display_detail_image"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}"><img src="{{asset('./../public/frontend/image/'.$relates->Img)}}" class="img-fluid mb-2" width="223px" alt=""></a></div>
                        <div class="item-info-home position-absolute text-center ">
                            <h6 class="pt-1 modal-open d-block pb-0 mb-0" style="display: -webkit-box;">{{$relates->BookName}}</h6>
                            <div class="product-price-slibar">
                                <span class="special-price font-weight-bold">{{$relates->PriceSale}}₫</span>
                                <del class="old-price">{{number_format($relates->PriceUnit,0)}}₫</del>
                            </div>
                            <button class="btn action font-weight-bold d-inline-block position-relative mt-1 mb-2"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}">Chi tiết</a></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mySlides p-2" style="display: block;">
                <div class="slide-container">
                    @foreach($relate_product->slice(10, 15) as $key => $relates)
                    <div class="border zoom p-3 m-1 d-inline-flex position-relative modal-open border">
                        <div class="display_detail_image"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}"><img src="{{asset('./../public/frontend/image/'.$relates->Img)}}" class="img-fluid mb-2" width="223px" alt=""></a></div>
                        <div class="item-info-home position-absolute text-center ">
                            <h6 class="pt-1 modal-open d-block pb-0 mb-0" style="display: -webkit-box;">{{$relates->BookName}}</h6>
                            <div class="product-price-slibar">
                                <span class="special-price font-weight-bold">{{number_format($relates->PriceSale,0)}}₫</span>
                                <del class="old-price">{{number_format($relates->PriceUnit,0)}}₫</del>
                            </div>
                            <button class="btn action font-weight-bold d-inline-block position-relative mt-1 mb-2"><a href="{{URL::to('/chi-tiet-san-pham/'.$relates->BookID)}}">Chi tiết</a></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{asset('./../public/frontend/js/script.js')}}"></script>
@endsection