@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh mục tác giả</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục tác giả</h5>
            @foreach($edit_author as $key => $edit_value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-author/'.$edit_value->AuthorID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên tác giả</label>
                        <input id="inputText3" type="text" class="form-control" name="author_name" value="{{$edit_value->AuthorName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Email</label>
                        <input id="inputText3" type="text" class="form-control" name="author_email" value="{{$edit_value->Email}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Phone</label>
                        <input id="inputText3" type="text" class="form-control" name="author_phone" value="{{$edit_value->Phone}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Giới tính</label>
                        <select class="custom-select" class="form-control" name="author_gender">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="author_status">
                            <option value="0">Còn cung cấp</option>
                            <option value="1">Hết cung cấp</option>
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