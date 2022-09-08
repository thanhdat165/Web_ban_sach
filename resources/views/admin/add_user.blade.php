@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Thêm danh mục nhân viên</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục nhân viên</h5>
            <div class="card-body">
                <form method="post" action="{{URL::to('/save-user')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Username</label>
                        <input id="inputText3" type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Password</label>                        
                        <input id="inputText3" type="text" class="form-control" name="password">            
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Role</label>
                        <input id="inputText3" type="text" class="form-control" name="role">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Gender</label>
                        <input id="inputText3" type="text" class="form-control" name="gender">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Phonenumber</label>
                        <input id="inputText3" type="tel" class="form-control" name="phonenumber">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Email</label>
                        <input id="inputText3" type="Email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Address</label>
                        <input id="inputText3" type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Status</label>
                        <select class="custom-select" class="form-control" name="status">
                            <option selected value="0">Còn làm</option>
                            <option value="1">Hết làm</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm nhân viên</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection