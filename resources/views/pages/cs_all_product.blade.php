@extends('welcome')
@section('content')
<link rel="stylesheet" href="{{asset('./../public/frontend/css/style.css')}}">

<div class="container">
    <div class="col-right pb-2">
        <div class="banner_collec row align-items-center pt-3 pb-0 mbs">
            <div class="col-lg-4 col-12">
                <a class="d-block item_bn_coll modal-open" href="#" title="Mew BS">
                    <img src="{{asset('./../public/frontend/image/collbn_img_1.png')}}" width="400px">
                </a>
            </div>
            <div class="col-lg-4 col-12">
                <a class="d-block item_bn_coll modal-open" href="#" title="Mew BS">
                    <img src="{{asset('./../public/frontend/image/collbn_img_2.png')}}" width="400px">
                </a>
            </div>
            <div class="col-lg-4 col-12">
                <a class="d-block item_bn_coll modal-open" href="#" title="Mew BS">
                    <img src="{{asset('./../public/frontend/image/collbn_img_3.png')}}" width="400px">
                </a>
            </div>
        </div>

    </div>
    <div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
		<div class="inner position-relative text-center">
			<h1 class="cat-heading d-none d-md-block">Tất cả sản phẩm</h1>
			<ul class="breadcrumb align-items-center justify-content-center m-0">
				<!-- <li class="home">
                        <a href="/" title="Mew BS">Trang chủ</a>						
                        <img src="#" alt="Mew BS">
                    </li>
                    <li>
                        <a href="#">Sách kĩ năng sống</a>						
                        <img src="#" alt="Mew BS">
                    </li> -->
				<li class="font-weight-bold"><span>Tất cả sản phẩm</span></li>
				<li>
				</li>
			</ul>
		</div>
	</div>
    <div class="row align-items-center pt-3 px-4 " style="margin-bottom:150px;">
        <!-- <div class="col-lg-3 p-0">
            <div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
                <div class="inner position-relative text-center">
                    <h2 class="d-none d-md-block"><a href="{{URL::to('/home')}}">Trang chủ</a></h2>
                    <ul class="breadcrumb align-items-center justify-content-center m-4">
                        <li class="font-weight-bold">
                             
                            <h4>Tất cả sản phẩm</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- <form action="{{URL::to('/filter-bookcs')}}" method='GET'> -->
        <!-- <div class="col-lg-9 col-12 ">
            <div class="filter-container row">
                <aside class="aside-item filter-vendor col-12 col-lg-4 col-xl-4">
                    <div class="h2 title-head m-0 font-weight-bold pb-2">Tác giả</div>
                    <div class="list-group list-group-flush">
                        @foreach($author as $key => $value)
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="authorid[]" type="radio" value="{{$value->AuthorID}}">
                            {{$value->AuthorName}}
                        </label>
                        @endforeach
                    </div>
                </aside>
                <aside class="aside-item filter-vendor col-12 col-lg-4 col-xl-4">
                    <div class="h2 title-head m-0 font-weight-bold pb-2">Lọc giá</div>
                    <div class="list-group list-group-flush">
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="1">
                            Giá dưới 100.000đ
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="2">
                            Giá 100.00đ - 200.000đ
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="3">
                            Giá 200.000đ - 500.000đ
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="4">
                            Giá 500.000đ - 1.000.000đ
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="5">
                            Giá 1.000.000đ - 2.000.000đ
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="price[]" type="radio" value="6">
                            Giá trên 2.000.000đ
                        </label>

                    </div>
                </aside>
                <aside class="aside-item filter-vendor col-12 col-lg-4 col-xl-4">
                    <div class="h2 title-head m-0 font-weight-bold pb-2">Thể loại</div>
                    <div class="list-group list-group-flush">
                        @foreach($category as $key => $value)
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="category[]" type="radio" value='{{$value->CategoryID}}'>
                            {{$value->CategoryName}}
                        </label>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div> -->
        <!-- <button type='submit'>Lọc</button>
        </form> -->
        
    </div>
    @if(session('product'))
    <section class='alert alert-success info-login info-login p-1' style="width:88%; height:50%px;">{{session('product')}}</section>
    @endif
    <div class="">
        <div class="collection ">
            <div class="category-products position-relative mt-4 mb-4 border">
                <div class="row ">
                    @foreach($product as $key => $value)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 product-grid-item-lm pt-1">
                        <div class="product-item position-relative modal-open border">
                            <div class="sale-label sale-top-right position-absolute">
                                <span class="font-weight-bold">-{{$value->Sale}}%</span>
                            </div>
                            <div class="position-relative w-100 m-0 ratio2by3 flip has-edge aspect">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$value->BookID)}}">
                                    <img src="{{asset('./../public/frontend/image/'.$value->Img)}}" class="d-block img img-cover lazy loaded zoom" width="300px">
                                </a>

                            </div>
                            <div class="item-info position-absolute text-center">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$value->BookID)}}">
                                    <h6 class="pt-1 modal-open d-block pb-0 mb-0" href="{{URL::to('/chi-tiet-san-pham/'.$value->BookID)}} style=" display: -webkit-box;">{{$value->BookName}}</h6>
                                </a>
                                <div class="product-price-slibar">
                                    <span class="special-price font-weight-bold">{{number_format($value->PriceSale,0)}}₫</span>
                                    <del class="old-price">{{number_format($value->PriceUnit,0)}}₫</del>
                                </div>
                                <button class="btn action font-weight-bold d-inline-block position-relative mt-1 mb-2"><a href="{{URL::to('/chi-tiet-san-pham/'.$value->BookID)}}">Chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection