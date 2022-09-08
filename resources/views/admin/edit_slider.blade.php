@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh mục slider</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục slider</h5>
            @foreach($edit_slider as $key => $value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-slider/'.$value->SliderID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên slider</label>
                        <input id="inputText3" type="text" class="form-control" name="slider_name" value="{{$value->SliderName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Link Slider</label>
                        <input id="inputText3" type="text" class="form-control" name="slider_link" value="{{$value->SliderLink}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="slider_status">
                            @if($value->SliderStatus == 0)
                                <option value=0 selected>Ẩn</option>
                                <option value=1>Hiện</option>
                            @else
                                <option value=0>Ẩn</option>
                                <option value=1 selected>Hiện</option>
                            @endif
                        </select>
                    </div> 
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật Slider</button>
                    </div>
                </form>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection