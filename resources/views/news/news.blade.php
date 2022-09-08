@extends('welcome')
@section('content')
<div>
<div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
		<div class="inner position-relative text-center">
			<h1 class="cat-heading d-none d-md-block">Tin tức</h1>
			<ul class="breadcrumb align-items-center justify-content-center m-0">
				<!-- <li class="home">
                        <a href="/" title="Mew BS">Trang chủ</a>						
                        <img src="#" alt="Mew BS">
                    </li>
                    <li>
                        <a href="#">Sách kĩ năng sống</a>						
                        <img src="#" alt="Mew BS">
                    </li> -->
				<li class="font-weight-bold"><span>Tin tức</span></li>
				<li>
				</li>
			</ul>
		</div>
	</div>

    <div class="container">
        <div class="col-main pt-5 pb-4">
            <article class="row">
                @foreach($news as $key => $value)
                <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-3 border">
                    <div class="item_grid mb-4">
                        <div class="position-relative">
                            <a href="{{URL::to('/news-detail/'.$value->NewsID)}}" title="Review sách Bình tĩnh khi ế, mạnh mẽ khi yêu - All The Rules" class="effect-ming">
                                <div class="position-relative w-100 m-0 be_opa modal-open">
                                    <img src="{{asset('./../public/frontend/image/'.$value->Img)}}" class="lazy loaded" alt="Review sách Bình tĩnh khi ế, mạnh mẽ khi yêu - All The Rules" width="300px;">
                                    <div class="position-absolute w-100 h-100 overlay"></div>
                                </div>
                            </a>

                            <div class="entry-date position-absolute text-center rounded-right">
                                <p class="day font-weight-bold m-0">
                                {{$value->NewsDay}}
                                </p>
                                <p class="yeah">
                                {{$value->NewsMonthYear}}
                                </p>
                            </div>
                        </div>
                        <div class="cont">
                            <h6 class="font-weight-bold mt-2 line_1" href="#" title="">Review sách {{$value->NewsName}}</h6>
                            <div class="line_3 line_1 h-auto">
                            {{$value->short_decription}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </article>
        </div>
    </div>
</div>
</div>

@endsection