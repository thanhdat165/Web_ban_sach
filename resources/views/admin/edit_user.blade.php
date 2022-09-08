@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh mục user</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục user</h5>
            @foreach($edit_user as $key => $value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-user/'.$value->UserID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Username</label>
                        <input id="inputText3" type="text" class="form-control" name="username" value="{{$value->Username}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Password</label>
                        <input id="inputText3" type="text" class="form-control" name="password" value="{{$value->Password}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Role</label>
                        <input id="inputText3" type="text" class="form-control" name="role" value="{{$value->Role}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Gender</label>
                        <input id="inputText3" type="text" class="form-control" name="gender" value="{{$value->Gender}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Phonenumber</label>
                        <input id="inputText3" type="tel" class="form-control" name="phonenumber" value="{{$value->PhoneNumber}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Email</label>
                        <input id="inputText3" type="Email" class="form-control" name="email" value="{{$value->Email}}">
                    </div>
                    <div class="form-group">
                    <label for="inputText3" class="col-form-label">Address</label>
                        <input id="inputText3" type="text" class="form-control" name="address" value="{{$value->Address}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Status</label>
                        <select class="custom-select" class="form-control" name="status">
                            <option selected value="0">Còn làm</option>
                            <option value="1">Hết làm</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật nhân viên</button>
                    </div>
                </form>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection