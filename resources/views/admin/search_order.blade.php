@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục hóa đơn</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <form class="form-inline" method="GET" action="{{URL::to('/search-order')}}" style="margin-left: 800px;" autocomplete="off">
        <div class="form-group">
            <input type="text" class="form-control" id="email" placeholder="Search..." name="order">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </form>
    <div class="card">
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table border-1">
                                    <thead class="bg-light">
                                        <tr class="border-1">
                                            <th class="border-1">ID</th>
                                            <th class="border-1">Username</th>
                                            <th class="border-1">Phone</th>
                                            <th class="border-1">Tổng tiền</th>
                                            <th class="border-1">Ngày tạo hóa đơn</th>
                                            <th class="border-1">Trạng thái</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                        @foreach($search_order as $key => $value)
                                        <tr class="border-1">
                                            <td class="border-1">{{$value->OrderID}}</td>   
                                            @foreach($search_customer as $key=>$value1)
                                                <td class="border-1"> 
                                                    @if($value->CustomerID == $value1->CustomerID)
                                                        {{$value1->username}}
                                                    @endif
                                                </td>
                                                <td class="border-1">
                                                    @if($value->CustomerID == $value1->CustomerID)
                                                        {{$value1->PhoneNumber}}
                                                    @endif                                                  
                                                </td>
                                            @endforeach
                                            <td class="border-1">{{$value->OrderID}}</td>
                                            <td class="border-1">{{$value->Create_at}}</td>                                                           
                                            <td class="border-1">
                                                @if($value->OrderStatus == 0)   
                                                    <span class="badge-dot badge-success mr-1"></span>Mới
                                                @endif
                                                @if($value->OrderStatus == 1)   
                                                    <span class="badge-dot badge-success mr-1"></span>Đang giao hàng
                                                @else
                                                    <span class="badge-dot badge-brand mr-1"></span>Đã giao hàng
                                                @endif
                                            </td>
                                            <td class="border-1">
                                                <a href="{{URL::to('/detail-order/'.$value->OrderID)}}" class="btn btn-outline-light float-left">Xem chi tiết</a>
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