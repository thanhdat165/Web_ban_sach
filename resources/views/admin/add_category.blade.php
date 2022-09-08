@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Thêm danh mục sản phẩm</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục sản phẩm</h5>
            <div class="card-body">
                <form method="post" action="{{URL::to('/save-category')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên danh mục</label>
                        <input id="inputText3" type="text" class="form-control" name="category_name">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label" >Danh mục cha</label>
                        <input id="inputText3" type="text" class="form-control" name="category_parentname">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="category_status">
                            <option value="0">Đang kinh doanh</option>
                            <option value="1">Ngừng kinh doanh</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                    </div>
                </form>

            </div>
            <!-- <div class="card-body border-top">
                <h3>Sizing</h3>
                <form>
                    <div class="form-group">
                        <label for="inputSmall" class="col-form-label">Small</label>
                        <input id="inputSmall" type="text" value=".form-control-sm" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="inputDefault" class="col-form-label">Default</label>
                        <input id="inputDefault" type="text" value="Default input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputLarge" class="col-form-label">Large</label>
                        <input id="inputLarge" type="text" value=".form-control-lg" class="form-control form-control-lg">
                    </div>
                </form>
            </div> -->

        </div>
    </div>
</div>
@endsection 