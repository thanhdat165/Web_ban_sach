@extends('welcome')
@section('content')
<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        $(document).ready(function(){
            $(".code").click(function() {
                var code = $(this).val();
                $.post("check_code.php", {
                    code: code
                },
                function(data, status) {
                        if (status == "success") {
                            alert(1);
                        }
                        else
                        {
                            alert(1);
                        }
                }
                )
            })
        });
    </script>
<div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
    <div class="inner position-relative text-center">
        <h1 class="cat-heading d-none d-md-block">Thanh toán đơn hàng</h1>
    </div>
</div>
<div class="wrap mt-3">
    <main class="main">
        <div class="main__content container">
            <form action="{{URL::to('/payment')}}" method="post">
                {{csrf_field()}}
                <article class="animate-floating-labels row">
                    <div class="col col--two border">
                        <section class="section p-2">
                            <div class="section__header">
                                <div class="layout-flex">
                                    <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                        <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>
                                        Thông tin nhận hàng
                                    </h2>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>
                                    Ghi chú
                                </label>
                                <textarea name="note" id="note" class="form-control" type="text"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label>Ma giam gia</label>
                                <input type="text" class="code"></input>
                            </div> -->
                            
            </form>
            </section>
        </div>
        <div class="col col--two border">
            <section class="section p-2">
                <div class="section__header">
                    <div class="layout-flex">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                            <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                            Đơn hàng
                        </h2>
                    </div>
                </div>
                @if(Session::has('login') && Session::get('login') == true)
                @foreach($cart as $cart_content)
                <div class="banner_collec row align-items-center pt-3 pb-0 mbs border mb-3 ux-card product p-0">
                    <div class="col-lg-3 col-12 mb-1">
                        <a class="modal-open border" href="#" title="Mew BS">
                            <img src="{{asset('./../public/frontend/image/'.$cart_content->image)}}" class="position-relative mr-3" width="100%">
                        </a>
                    </div>
                    <div class="col-lg-9 col-12">
                        <a class="d-block item_bn_coll modal-open" title="Mew BS">
                            <div class="row">
                                <div class="col-12 d-flex m-0">
                                    <p class="item-title clearfixrow">
                                    <div class="mt-0">
                                        <input name="id[]" value="{{$cart_content->id}}" type="hidden">
                                        <input name="qty[]" value="{{$cart_content->qty}}" type="hidden">
                                        <a href="#" class="font-weight-bold" style="font-size:18px;">{{$cart_content->name}}</a>
                                        <span class="d-block small font-weight-bold">Số lượng: {{$cart_content->qty}}</span>
                                        <span class="price ml-auto text-left clearfix d-block" style="font-size:20px;">Giá:
                                            <?php
                                            $subtotal = $cart_content->price * $cart_content->qty;
                                            echo number_format($subtotal,0);
                                            ?>₫
                                        </span>
                                        <input name="price[]" value="{{$cart_content->price * $cart_content->qty}}" type="hidden">
                                    </div>
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                <?php
                $content = Cart::content();
                ?>
                @foreach($content as $cart_content)
                <div class="banner_collec row align-items-center pt-3 pb-0 mbs border mb-3 ux-card product p-0">
                    <div class="col-lg-3 col-12 mb-1">
                        <a class="modal-open border" href="#" title="Mew BS">
                            <img src="{{asset('./../public/frontend/image/'.$cart_content->options->image)}}" class="position-relative mr-3" width="100%">
                        </a>
                    </div>
                    <div class="col-lg-9 col-12">
                        <a class="d-block item_bn_coll modal-open" title="Mew BS">
                            <div class="row">
                                <div class="col-12 d-flex m-0">
                                    <p class="item-title clearfixrow">
                                    <div class="mt-0">
                                        <input name="id[]" value="{{$cart_content->id}}" type="hidden">
                                        <a href="#" class="font-weight-bold" style="font-size:18px;">{{$cart_content->name}}</a>
                                        <span class="d-block small font-weight-bold">Số lượng: {{$cart_content->qty}}</span>
                                        <input name="qty[]" value="{{$cart_content->qty}}" type="hidden">
                                        <span class="price ml-auto text-left clearfix d-block" style="font-size:20px;">Giá:
                                            <?php
                                            $subtotal = $cart_content->price * $cart_content->qty;
                                            echo $subtotal;
                                            ?>
                                        </span>
                                        <input name="price[]" value="{{$cart_content->price * $cart_content->qty}}" type="hidden">
                                    </div>
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
        </div>
        <div class="col-lg-2 col-md-0 col-sm-0 col-xs-4 d-inline-block summary">
            <dl class="total mb-2 p-3 align-items-center clearfix flex-wrap justify-content-end rounded">
                <dt class="items-center font-weight-bold roun">Tổng tiền</dt>
                @if(Session::has('login') && Session::get('login') == true)
                <p class="cart__summary_total fs-3 font-weight-bold ml-auto mb-0">{{number_format($total,0)}}₫</p>
                <input name="total" value="{{$total}}" type="hidden">
                @else
                <p class="cart__summary_total fs-3 font-weight-bold ml-auto mb-0">{{Cart::subtotal()}}</p>
                <input name="total" value="{{Cart::subtotal()}}" type="hidden">
                @endif
            </dl>
            @if(Session::has('login') && Session::get('login') == true)
            <button type="submit" class="btn d-flex w-100 justify-content-center flex-row align-items-center rounded pt-2 pb-2 mt-2 product-action_buy js-addToCart sitdown modal-open text-uppercase font-weight-bold">
                Đặt hàng
            </button>
            @endif
            <button type="submit" class="btn d-flex w-100 justify-content-center flex-row align-items-center rounded pt-2 pb-2 mt-2 product-action_buy js-addToCart sitdown modal-open text-uppercase font-weight-bold">
                Thanh toán ngay
            </button>
        </div>
        </article>
        </form>
        <div class="hide-on-desktop d-flex m-2">
            <a href="{{URL::to('/cart')}}" class="previous-link" style="font-size: 20px;">
                <i class="">❮</i>
                <span class="previous-link__content">Quay về giỏ hàng</span>
            </a>

        </div>

</div>
</main>
</div>
<script type="text/javascript" src="{{asset('./../public/frontend/js/script.js')}}"></script>
@endsection