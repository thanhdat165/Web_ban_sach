<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{asset('./../public/frontend/image/log_1.png')}}" type="image/ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./../public/frontend/css/style.css')}}">

    <title>Meo BS</title>
</head>

<body style="overflow-x: hidden;">
    <div class="w-100">
        <image class="ml-auto d-inline-block w-100" src="{{asset('./../public/frontend/image/top_bn.png')}}"></image>
        <nav class="navbar navbar-expand-lg navbar-light bg-white w-100">
            <div class="container-fluid w-100">
                <image class="col-12 col-lg-2 d-none d-lg-block" src="{{asset('./../public/frontend/image/logo.png')}}"></image>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-12 col-lg-10" id="navbarNavDropdown">
                    <ul class="navbar-nav" style="margin-right:5%">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{URL::to('/home')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/collections/all')}}">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/news')}}">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/chinh-sach')}}">Chính sách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('/lien-he')}}">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="navigation-bottom mt-auto mt-lg-0 ms-100 ms-5">
                        <nav class="navbar navbar-light bg-light p10">
                            <div class="container-fluid">
                                <form class="d-flex" action="{{URL::to('/search-bookcs')}}" method="GET">
                                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="book">                                   
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search pt" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                    </i></button>
                                </form>
                            </div>
                        </nav>
                    </div>
                    <div class="dropdown m-1">
                        @if(Session::has('login') && Session::get('login') == true)
                        <button aria-expanded="false" data-toggle="dropdown" type="button" class="dropdown-item btn d-flex w-100 justify-content-center flex-row align-items-center rounded pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open text-uppercase font-weight-bold">
                            Xin chào {{ Session::get('name') }}
                        </button>
                        <div class="dropdown-menu pop_login position-absolute top-100 text-center rounded active" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{URL::to('/don-hang')}}">Đơn hàng của bạn</a>
                            <a class="dropdown-item" href="{{URL::to('/logout')}}">Đăng xuất</a>
                        </div>
                        @else
                        <button class="btn d-flex justify-content-center flex-row align-items-center rounded pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu pop_login position-absolute p-1 m-1 text-center rounded active" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{URL::to('/login')}}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{URL::to('/signup')}}">Đăng kí</a>
                        </div>
                        @endif
                    </div>
                    <button aria-expanded="false" type="button" class="m-1 btn d-flex justify-content-center flex-row align-items-center rounded pt-2 pb-2 product-action_buy js-addToCart sitdown modal-open" type="submit">
                        <a href="{{URL::to('/cart')}}" style="color:white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>
                    </button>

                </div>
            </div>
        </nav>
    </div>

    <div>
        @yield('content')
    </div>


    <footer class="pt-5">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-xl-4 col-lg-3 col-md-8 col-sm-6 col-xs-12 footer-left mb-4">
                    <h3 class="footer-title mb-3 position-relative font-weight-bold">Liên hệ Mew BS</h3>
                    <p>Địa chỉ: Ladeco Building, 266 Doi Can Street, Ba Dinh District, Hanoi.</p>
                    <p>Email: <a href="mailto:support@sapo.vn " title="support@sapo.vn ">support@sapo.vn </a></p>
                    <p>Số điện thoại: <a href="tel:19006750" title="1900 6750">1900 6750</a></p>
                    <h3 class="footer-title mb-3 mt-3 position-relative font-weight-bold">Kết nối với chúng tôi</h3>
                    <div class="social position-relative">
                        <div class="onut pt-2 pb-2">
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block facebook mr-1" title="Facebook">
                                <img src="//bizweb.dktcdn.net/100/415/471/themes/804607/assets/facebook.png?1634809483920" alt="facebook">
                            </a>
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block twitter mr-1" title="Twitter">
                                <img src="//bizweb.dktcdn.net/100/415/471/themes/804607/assets/twitter.png?1634809483920" alt="twitter">
                            </a>
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block instagram mr-1" title="Instagram+">
                                <img src="//bizweb.dktcdn.net/100/415/471/themes/804607/assets/instagram.png?1634809483920" alt="instagram">
                            </a>
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block youtube mr-1" title="Youtube">
                                <img src="//bizweb.dktcdn.net/100/415/471/themes/804607/assets/youtube.png?1634809483920" alt="youtube">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 footer-left mb-4">
                    <h3 class="footer-title mb-3 position-relative font-weight-bold">Chính sách</h3>
                    <ul class="links">

                        <li><a href="#" title="Chính sách bán hàng">Chính sách bán hàng</a></li>

                        <li><a href="#" title="Chính sách hoàn hàng">Chính sách hoàn hàng</a></li>

                        <li><a href="#" title="Chính sách vận chuyển">Chính sách vận chuyển</a></li>

                        <li><a href="#" title="Chính sách cộng tác viên">Chính sách cộng tác viên</a></li>

                        <li><a href="#" title="Chính sách COD">Chính sách COD</a></li>

                        <li><a href="#" title="Chính sách bảo hành">Chính sách bảo hành</a></li>

                    </ul>
                </div>
                <div class="col-lg-6 col-12 col-xs-12 footer-left">

                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="{{('./../public/frontend/js/script.js')}}"></script>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>