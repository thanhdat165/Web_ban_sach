@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh mục sản phẩm</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục sản phẩm</h5>
            @foreach($edit_category as $key => $edit_value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-category/'.$edit_value->CategoryID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên danh mục</label>
                        <input id="inputText3" type="text" class="form-control" name="category_name" value="{{$edit_value->CategoryName}}">
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputText3" class="col-form-label">Danh mục cha</label>
                        <input id="inputText3" type="text" class="form-control" name="category_parentname">
                    </div>-->
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="category_status">
                            <option selected value="0">Trạng thái</option>
                            <option value="0">Đang kinh doanh</option>
                            <option value="1">Ngừng kinh doanh</option>
                        </select>
                    </div> 

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật danh mục</button>
                    </div>
                </form>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection