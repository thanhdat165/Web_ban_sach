@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Thêm danh mục slider</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục slider</h5>
            <div class="card-body">
                <form method="post" action="{{URL::to('/save-slider')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên Slider</label>
                        <input id="inputText3" type="text" class="form-control" name="slider_name">
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Link Slider</label>
                        <input id="inputText3" type="url" class="form-control" name="slider_link">
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Image</label>
                        <input id="inputText3" type="file" class="form-control" name="slider_img">
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="slider_status">
                            <option selected value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection