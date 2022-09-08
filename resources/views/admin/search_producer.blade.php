@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục nhà cung cấp</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
    </div>
    <div>
        <form class="form-inline" method="GET" action="{{URL::to('/search-producer')}}" style="margin-left: 1100px;" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Search..." name="producer"">
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
                                            <th class="border-0">Tên nhà cung cấp</th>
                                            <th class="border-0">Trạng thái</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($search_producer as $key => $value)
                                        <tr>
                                            <td>{{$value->ProducerID}}</td>
                                            <td>{{$value->ProducerName}}</td>
                                            <td>
                                                @if($value->ProducerStatus == 0)   
                                                    <span class="badge-dot badge-success mr-1"></span>Đang cung cấp
                                                @else
                                                    <span class="badge-dot badge-brand mr-1"></span>Ngừng cung cấp
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-producer/'.$value->ProducerID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                                <a href="{{URL::to('/edit-producer/'.$value->ProducerID)}}" class="btn btn-outline-light float-left">Sửa</a>
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