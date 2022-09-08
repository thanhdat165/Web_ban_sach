@extends('admin_layout')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="section-block" id="basicform">
        <h3 class="section-title">Danh mục slider</h3>
        <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
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
                                            <th class="border-0">Slider name</th>
                                            <th class="border-0">slider link</th>
                                            <th class="border-0">Img</th>
                                            <th class="border-0">Trạng thái</th>
                                            <th class="border-0">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_slider as $key => $value)
                                        <tr>
                                            <td>{{$value->SliderID}}</td>
                                            <td>{{$value->SliderName}}</td>
                                            <td>{{$value->SliderLink}}</td>
                                            <td><img src="{{asset('./../public/frontend/image/'.$value->Img)}}" class="img-fluid" width="219px" alt=""></td>
                                            <td>
                                                @if($value->SliderStatus == 1)   
                                                    <span class="badge-dot badge-success mr-1"></span>Hiện
                                                @else
                                                    <span class="badge-dot badge-brand mr-1"></span>Ẩn
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick ="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-slider/'.$value->SliderID)}}" class="btn btn-outline-light float-left">Xóa</a>
                                                <a href="{{URL::to('/edit-slider/'.$value->SliderID)}}" class="btn btn-outline-light float-left">Sửa</a>
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