@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh mục slider</h5>
            <div class="card-body">
                <form method="post" action="{{URL::to('/updateactive-slider/')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Slider 1</label>
                        <select name="slider1"> 
                            @foreach($all_slider as $key => $value)
                                <option value="{{$value->SliderID}}">{{$value->SliderName}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Slider 2</label>
                        <select name="slider2">
                            @foreach($all_slider as $key => $value)
                                <option value="{{$value->SliderID}}">{{$value->SliderName}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Slider 3</label>
                        <select name="slider3">
                            @foreach($all_slider as $key => $value)
                                <option value="{{$value->SliderID}}">{{$value->SliderName}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection