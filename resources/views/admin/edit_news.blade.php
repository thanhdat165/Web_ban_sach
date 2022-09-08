@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa tin tức</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            @foreach($edit_news as $key => $value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-news/'.$value->NewsID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên tin tức</label>
                        <input id="inputText3" type="text" class="form-control" name="news_name" value="{{$value->NewsName}}" required>
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">NewsDay</label>
                        <input id="inputText3" type="text" class="form-control" name="newsday" value="{{$value->NewsDay}}" required>
                    </div>  
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">NewsMonthYear</label>
                        <input id="inputText3" type="text" class="form-control" name="newmonthyear" value="{{$value->NewsMonthYear}}" required>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Introduction</label>
                        <textarea style="resize: none" rows="4" id="inputText3" class="form-control" name="news_introduction" required>{{$value->Introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Description</label>
                        <textarea id="inputText3" style="resize: none" rows="8"  class="form-control" name="news_description" required>{{$value->Description}}</textarea>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection