@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">DANH MỤC SẢN PHẨM</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <div>
        <form class="form-inline" method="GET" action="{{URL::to('/search-category')}}" style="margin-left: 800px;" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Search..." name="category">
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
                                            <th class="border-0">Tên danh mục</th>
                                            <th class="border-0">Danh mục cha</th>
                                            <th class="border-0">Ngày tạo</th>
                                            <th class="border-0">Ngày cập nhật</th>
                                            <th class="border-0">Trạng thái</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_category as $key => $value)
                                        <tr>
                                            <td>{{$value->CategoryID}}</td>
                                            <td>{{$value->CategoryName}}</td>
                                            <td>{{$value->ParentID}}</td>
                                            <td>{{$value->Created_at}}</td>
                                            <td>{{$value->Update_at}}</td>
                                            <td>
                                                @if($value->CategoryStatus == 0)   
                                                    <span class="badge-dot badge-success mr-1"></span>Đang kinh doanh
                                                @else
                                                <span class="badge-dot badge-brand mr-1"></span>Ngừng kinh doanh
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-category/'.$value->CategoryID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                                <a href="{{URL::to('/edit-category/'.$value->CategoryID)}}" class="btn btn-outline-light float-left">Sửa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                        </tr> -->
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