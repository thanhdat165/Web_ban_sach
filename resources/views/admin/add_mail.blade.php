@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Mail thông báo</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{URL::to('/post-email')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" type="text" class="form-control" name="title"></input>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label" >Description</label>
                        <textarea id="inputText3" style="resize: none" rows="8" class="form-control" name="book_des"></textarea>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 