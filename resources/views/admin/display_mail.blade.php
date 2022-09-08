@extends('admin_layout')
@section('content')
Gửi mail thành công!!!<br>
<form method="get" action="{{URL::to('/admin')}}">
    {{ csrf_field() }}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <button class="btn btn-primary" type="submit">Quay về trang admin</button>
    </div>
</form>
@endsection