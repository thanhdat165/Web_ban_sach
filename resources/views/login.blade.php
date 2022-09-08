<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('./../public/frontend/css/style1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Login form</title>
    <script>
        // $(document).ready(function(){
        //    $(".subsignup").click(function(){
        //        header('location: ./signup.html');
        //    })         
        //});
    </script>
</head>

<body>
    <!-- Đăng nhập -->
    <section class="login-layout d-flex align-items-center justify-content-center p-2">
        <div class="container ">
            <section class="Login register-layout d-flex justify-content-center my-5 form-group col-12">
                <div class="registration border1 border2 box_log ">
                    <div class="header-form">
                        <h2>Đăng nhập</h2>
                    </div>
                    <form action="{{URL::to('/login')}}" method="post" class="sub-login b_big col-11" autocomplete="off">
                    @if(session('alert'))
                        <section class='alert alert-success info-login info-login p-1' style="width:88%; height:50%px;">{{session('alert')}}</section>
                    @endif
                        {{ csrf_field() }}
                        <input type="text" class="info-login info-login border2" name="username" placeholder="Tên tài khoản"><br>
                        <input type="password" class="info-login border2 " name="password" placeholder="Mật khẩu"><br>
                        <input type="submit" class="info-login border2 btn-submit" name="dangnhap" value="Đăng nhập"><br>
                        <a href="" class="forget-pass">Quên mật khẩu?</a>
                        <div class="sign-up">
                            <div>
                                <p class="header-signup">Need an account?<br></p>
                                <a href="{{URL::to('/signup')}}" class="info-login border2 home subsignup" style="color:white">Đăng ký</a>
                                <!-- <input type="submit" class="info-login border2 subsignup" value="Đăng ký" action="./signup.html"> -->
                            </div>

                            <!-- <form action="home.html">
                            <input type="submit" class="info-login border2 home" value="Về trang chủ">
                        </form> -->
                            <a href="{{URL::to('/home')}}" class="info-login border2 home" style="color:white">Về trang chủ</a>
                        </div>
                    </form>
                </div>

            </section>

    </section>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>