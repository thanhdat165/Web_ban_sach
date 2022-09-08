@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục customer</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <form class="form-inline" method="GET" action="{{URL::to('/search-customer')}}" style="margin-left: 800px;" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Search..." name="customer">
            </div>
            <button type="submit" class="btn btn-default" style="background-color: #ccc"><i class="fa fa-search"></i></button>
        </form>
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
                                            <th class="border-0">Customername</th>
                                            <th class="border-0">Username</th>
                                            <th class="border-0">Password</th>
                                            <th class="border-0">Gender</th>
                                            <th class="border-0">Phonenumber</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Address</th>
                                            <th class="border-0">Status</th>
                                            <!-- <th class="border-0">Thao tác</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_customer as $key => $value)
                                        <tr>
                                            <td>{{$value->CustomerID}}</td>
                                            <td>{{$value->CustomerName}}</td>
                                            <td>{{$value->username}}</td>
                                            <td>{{$value->password}}</td>
                                            <td>
                                                @if($value->Gender == 0)   
                                                    Nam
                                                @else
                                                    Nữ
                                                @endif
                                            </td>
                                            <td>{{$value->PhoneNumber}}</td>
                                            <td>{{$value->Email}}</td>
                                            <td>{{$value->Address}}</td>
                                            <td>
                                                <?php
                                                if($value->CustomerStatus == 0){  
                                                ?>
                                                    <a class="unblock-customer" href="{{URL::to('/unactive-customer/'.$value->CustomerID)}}"><span class="fa fa-unlock"></span></a>
                                                <?php                                                            
                                                }
                                                else
                                                {
                                                ?>
                                                    <a class= "block-customer" href="{{URL::to('/active-customer/'.$value->CustomerID)}}"><span class="fa fa-lock"></span></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <!-- <td>
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-customer/'.$value->CustomerID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                            </td> -->
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
<script type="text/javascript" src="{{asset('./../public/frontend/js/script.js')}}"></script>
@endsection