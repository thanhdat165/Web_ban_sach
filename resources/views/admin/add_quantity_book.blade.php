!@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Thêm số lượng sách</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            @foreach($add_quantity_book as $key => $value)
                <div class="card-body">
                    <form method="post" action="{{URL::to('/save-quantity/'.$value->BookID)}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label">Số lượng còn lại</label>
                            <input readonly="readonly" id="inputText3" type="text" class="form-control" name="quantity" value="{{$value->Quantity}}">
                        </div>  
                        <div class="form-group">
                            <label class="col-form-label">Nhập số lượng cần thêm</label>
                            <input type="number" class="form-control" name="add_quantity">
                        </div>  
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button class="btn btn-primary" type="submit">Xác nhận</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection