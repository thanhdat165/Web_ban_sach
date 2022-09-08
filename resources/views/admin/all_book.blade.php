@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục sản phẩm</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <form class="form-inline" method="GET" action="{{URL::to('/search-book')}}" style="margin-left: 800px;" autocomplete="off">
        <div class="form-group">
            <input type="text" class="form-control" id="email" placeholder="Search..." name="book">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
    </form>
    <div class="card">
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Recent Authors</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table border-1">
                                    <thead class="bg-light">
                                        <tr class="border-1">
                                            <th class="border-1">ID</th>
                                            <th class="border-1">Tên sách</th>
                                            <th class="border-1">Image</th>
                                            <th class="border-1">Tên tác giả</th>
                                            <th class="border-1">Tên nhà cung cấp</th>
                                            <th class="border-1">Tên danh mục</th>
                                            <!-- <th class="border-1">Introduction</th>
                                            <th class="border-1">Description</th>
                                            <th class="border-1">Price unit</th>
                                            <th class="border-1">Sale</th>
                                            <th class="border-1">Price sale</th> -->
                                            <th class="border-1">Quantity</th>
                                            <!-- <th class="border-1">Quantity buy</th> -->
                                            <th class="border-1">Book status</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                        @foreach($all_book as $key => $value)
                                        <tr class="border-1">
                                            <td class="border-1">{{$value->BookID}}</td>
                                            <td class="border-1">{{$value->BookName}}</td>
                                            <td><img src="{{asset('./../public/frontend/image/'.$value->Img)}}" class="img-fluid" width="219px" alt=""></td>
                                            <td class="border-1">
                                                @foreach($all_book1 as $key=>$value1)
                                                    @if($value->AuthorID == $value1->AuthorID)
                                                        {{$value1->AuthorName}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="border-1">
                                                @foreach($all_book2 as $key=>$value2)
                                                    @if($value->ProducerID == $value2->ProducerID)
                                                        {{$value2->ProducerName}}
                                                    @endif                                                  
                                                @endforeach
                                            </td>
                                            <td class="border-1">
                                                @foreach($all_book3 as $key=>$value3)
                                                    @if($value->CategoryID == $value3->CategoryID)
                                                        {{$value3->CategoryName}}
                                                    @endif    
                                                @endforeach
                                            </td>                                                                  
                                            <!-- <td class="border-1">//{{$value->Introduction}}</td>
                                            <td class="border-1">//{{$value->Description}}</td>
                                            <td class="border-1">//{{$value->PriceUnit}}</td>
                                            <td class="border-1">//{{$value->Sale}}</td>
                                            <td class="border-1">//{{$value->PriceSale}}</td> -->
                                            <td class="border-1">{{$value->Quantity}}</td>
                                            <!-- <td class="border-1">{{$value->Quantity_buy}}</td> -->
                                            <td class="border-1">
                                                @if($value->BookStatus == 0)   
                                                    <span class="badge-dot badge-success mr-1"></span>Còn hàng
                                                @else
                                                    <span class="badge-dot badge-brand mr-1"></span>Hết hàng
                                                @endif
                                            </td>
                                            <td class="border-1">
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-book/'.$value->BookID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                                <a href="{{URL::to('/edit-book/'.$value->BookID)}}" class="btn btn-outline-light float-left">Sửa</a>
                                                <a href="{{URL::to('/input-quantity/'.$value->BookID)}}" class="btn btn-outline-light float-left">Add quantity</a>
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