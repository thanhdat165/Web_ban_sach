@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh nhà cung cấp</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục nhà cung cấp</h5>
            @foreach($edit_producer as $key => $value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-producer/'.$value->ProducerID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên danh mục</label>
                        <input id="inputText3" type="text" class="form-control" name="producer_name" value="{{$value->ProducerName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="producer_status">
                            <option value="0">Đang cung cấp</option>
                            <option value="1">Ngừng cung cấp</option>
                        </select>
                    </div> 

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật nhà cung cấp</button>
                    </div>
                </form>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection