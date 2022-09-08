<link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('./../public/backend/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục nhân viên</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <div>
        <form class="form-inline" method="GET" action="{{URL::to('/search-user')}}" style="margin-left: 800px;" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Search..." name="user">
            </div>
            <button type="submit" class="btn btn-default" style="background-color: #ccc"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="card">
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ID</th>
                                            <th class="border-0">Username</th>
                                            <th class="border-0">Password</th>
                                            <th class="border-0">Role</th>
                                            <th class="border-0">Gender</th>
                                            <th class="border-0">Phonenumber</th>
                                            <th class="border-0">Email</th>
                                            <!-- <th class="border-0">Address</th> -->
                                            <th class="border-0">Trạng thái</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($search_user as $key => $value)
                                        <tr>
                                            <td>{{$value->UserID}}</td>
                                            <td>{{$value->username}}</td>
                                            <td>{{$value->password}}</td>
                                            <td>{{$value->Role}}</td>
                                            <td>
                                                @if($value->Gender == 0)   
                                                    Nam
                                                @else
                                                    Nữ
                                                @endif
                                            </td>
                                            <td>{{$value->PhoneNumber}}</td>
                                            <td>{{$value->Email}}</td>
                                            <!-- <td>{{$value->Address}}</td> -->
                                            <td>
                                                <?php
                                                if($value->UserStatus == 0){  
                                                ?>
                                                    <a class="unblock-user" href="{{URL::to('/unactive-user/'.$value->UserID)}}"><span class="fa fa-unlock"></span></a>
                                                <?php                                                            
                                                }
                                                else
                                                {
                                                ?>
                                                    <a class= "block-user" href="{{URL::to('/active-user/'.$value->UserID)}}"><span class="fa fa-lock"></span></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-user/'.$value->UserID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                                <a href="{{URL::to('/edit-user/'.$value->UserID)}}" class="btn btn-outline-light float-left">Sửa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection