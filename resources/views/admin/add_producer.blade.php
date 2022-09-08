@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Thêm danh mục nhà cung cấp</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục nhà cung cấp</h5>
            <div class="card-body">
                <form method="post" action="{{URL::to('/save-producer')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên nhà cung cấp</label>
                        <input id="inputText3" type="text" class="form-control" name="producer_name">
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="producer_status">
                            <option selected value="0">Còn cung cấp</option>
                            <option value="1">Hết cung cấp</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm nhà cung cấp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection