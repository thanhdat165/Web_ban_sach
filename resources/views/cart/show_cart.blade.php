@extends('welcome')
@section('content')
<div>
    <div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
        <div class="inner position-relative text-center">
            <h1 class="cat-heading d-none d-md-block">Giỏ hàng</h1>
        </div>
    </div>
    <div class="container  mt-3 mb-5">
        <div class="row d-block col-xs-12 d-flex">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-8 d-inline-block ">
                @if(Session::has('login') && Session::get('login') == true)
                @foreach($cart as $cart_content)
                <div class="banner_collec row align-items-center pt-3 pb-0 mbs border mb-3 ux-card product p-0">
                    <div class="col-lg-2 col-12 mb-1">
                        <a class="modal-open border" href="#" title="Mew BS">
                            <img src="{{asset('./../public/frontend/image/'.$cart_content->image)}}" class="position-relative mr-3" width="80%">
                        </a>
                    </div>
                    <div class="col-lg-6 col-12">
                        <a class="d-block item_bn_coll modal-open" title="Mew BS">
                            <div class="row">
                                <div class="col-12 d-flex m-0">
                                    <p class="item-title clearfixrow">
                                    <div class="mt-0">
                                        <h3 href="#" title="NGHĨ THÔNG KHÔNG LAO LỰC" class="font-weight-bold" style="font-size:20px;">{{$cart_content->name}}</h3>
                                        <span class="d-block small font-weight-bold"></span>
                                        <span class="price ml-auto text-left clearfix d-block" style="font-size:20px;">Giá: {{number_format($cart_content->price,0)}}₫</span>
                                        <div class="custom-btn-number d-flex" style="width:100%">
                                            <form action="{{URL::to('/update-cart-quantity')}}" method="post" class="d-flex">
                                                {{csrf_field()}}
                                                <input type="hidden" name="BookID" value="{{$cart_content->id}}">
                                                <input type="hidden" name="price" value="{{$cart_content->price}}">
                                                @if($cart_content->Quantity > 20)
                                                
                                                    <input type="number" maxlength="2" name="quantity" min="1" max='20' value="{{$cart_content->qty}}" class="form-control m-0 border rounded" style="width:95%" required>
                                                
                                                @else
                                                    <input type="number" maxlength="2" name="quantity" min="1" max='{{$cart_content->Quantity}}' value="{{$cart_content->qty}}" class="form-control m-0 border rounded" style="width:95%" required>
                                                @endif                   
                                                <button class="btn d-flex justify-content-center flex-row align-items-center rounded pt-2 pb-2 mb-1" type="submit">
                                                    <a style="color:white;" class="">Cập nhật</a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-12 ">
                        <a class="d-block modal-open p-1" href="#">
                            <span class="price ml-auto text-left clearfix d-block mb-1" style="font-size:20px;">Tổng:
                                <?php
                                echo number_format($cart_content->price * $cart_content->qty,0);
                                ?>₫
                            </span>
                        </a>
                    </div>
                    <div class="col-lg-1 col-12 ">
                        <div class="m-2" style="float:right;">
                            <button style="float:right;" class="btn d-flex justify-content-center flex-row align-items-center rounded mt-1 pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open">
                                <a href="{{URL::to('/delete-to-cart/'.$cart_content->id)}}" style="color:white;">Xóa</a>
                            </button>
                        </div>
                    </div>

                </div>
                @endforeach
                @else
                <?php
                $content = Cart::content();
                ?>
                @foreach($content as $cart_content)
                <div class="banner_collec row align-items-center pt-3 pb-0 mbs border mb-3 ux-card product p-0">
                    <div class="col-lg-2 col-12 mb-1">
                        <a class="modal-open border" href="#" title="Mew BS">
                            <img src="{{asset('./../public/frontend/image/'.$cart_content->options->image)}}" class="position-relative mr-3" width="80%">
                        </a>
                    </div>
                    <div class="col-lg-6 col-12">
                        <a class="d-block item_bn_coll modal-open" title="Mew BS">
                            <div class="row">
                                <div class="col-12 d-flex m-0">
                                    <p class="item-title clearfixrow">
                                    <div class="mt-0">
                                        <h3 href="#" title="NGHĨ THÔNG KHÔNG LAO LỰC" class="font-weight-bold" style="font-size:20px;">{{$cart_content->name}}</h3>
                                        <span class="d-block small font-weight-bold"></span>
                                        <span class="price ml-auto text-left clearfix d-block" style="font-size:20px;">Giá: {{$cart_content->price}}₫</span>
                                        <div class="custom-btn-number d-flex" style="width:100%">
                                            <form action="{{URL::to('/update-cart-quantity')}}" method="post" class="d-flex">
                                                {{csrf_field()}}
                                                <input type="hidden" name="RowID" value="{{$cart_content->rowId}}">
                                                <input type="number" maxlength="2" name="quantity" min="1" value="{{$cart_content->qty}}" class="form-control m-0 border rounded" style="width:80%">
                                                <button class="btn d-flex justify-content-center flex-row align-items-center rounded pt-2 pb-2 mb-1" type="submit">
                                                    <a style="color:white;" class="">Cập nhật</a>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-12 ">
                        <a class="d-block modal-open" href="#" title="Mew BS">
                            <span class="price ml-auto text-left clearfix d-block mb-1" style="font-size:20px;">Tổng:
                                <?php
                                $subtotal = $cart_content->price * $cart_content->qty;
                                echo $subtotal;
                                ?>
                            </span>
                        </a>
                    </div>
                    <div class="col-lg-1 col-12 ">
                        <button style="float:right;" class="btn d-flex justify-content-center flex-row align-items-center rounded mt-1 pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open">
                            <a href="{{URL::to('/delete-to-cart/'.$cart_content->rowId)}}" style="color:white;">Xóa</a>
                        </button>
                    </div>

                </div>
                @endforeach
                @endif
            </div>

            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-4 d-inline-block summary">
                <dl class="total mb-2 p-3 align-items-center clearfix flex-wrap justify-content-end rounded">
                    <dt class="items-center font-weight-bold roun">Tổng tiền</dt>
                    @if(Session::has('login') && Session::get('login') == true)
                    <p class="cart__summary_total fs-3 font-weight-bold ml-auto mb-0">{{number_format($total,0)}}₫</p>
                    @else
                    <p class="cart__summary_total fs-3 font-weight-bold ml-auto mb-0">{{Cart::subtotal()}}</p>
                    @endif
                </dl>

                <button type="submit" class="btn d-flex w-100 justify-content-center flex-row align-items-center rounded pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open text-uppercase font-weight-bold">
                    @if(Session::has('login') && Session::get('login') == true)
                    <a href="{{URL::to('/checkout')}}" style="color:white;">Thanh toán</a>
                    @else
                    <a href="{{URL::to('/login')}}" style="color:white;">Thanh toán</a>
                    @endif
                </button>

            </div>
        </div>
    </div>
</div>
</div>
@endsection