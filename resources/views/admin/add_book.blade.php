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
                <form method="post" action="{{URL::to('/save-book')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên sách</label>
                        <input id="inputText3" type="text" class="form-control" name="book_name">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên tác giả</label>                        
                        <select class="custom-select" class="form-control" name="book_authorid">
                            @foreach($add_book1 as $key => $value)
                                <option value="{{$value->AuthorID}}">{{$value->AuthorName}}</option>
                            @endforeach
                        </select>   
                        <p>Nếu chưa có tác giả trong danh mục vui lòng thêm tác giả</p>                   
                        <a href="{{URL::to('/add-author')}}" class="btn-outline-light btn btn-primary">Thêm tác giả</a>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên nhà cung cấp</label>
                        <select class="custom-select" class="form-control" name="book_producerid">
                            @foreach($add_book2 as $key => $value)
                                <option value="{{$value->ProducerID}}">{{$value->ProducerName}}</option>
                            @endforeach
                        </select>                      
                        <p>Nếu chưa có nhà cung cấp trong danh mục vui lòng thêm nhà cung cấp</p>                   
                        <a href="{{URL::to('/add-producer')}}" class="btn-outline-light btn btn-primary">Thêm nhà cung cấp</a>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên danh mục sản phẩm</label>
                        <select class="custom-select" class="form-control" name="book_categoryid">
                            @foreach($add_book3 as $key => $value)
                                <option value="{{$value->CategoryID}}">{{$value->CategoryName}}</option>
                            @endforeach
                        </select>
                        <p>Nếu chưa có loại sản phẩm trong danh mục vui lòng thêm loại sản phẩm</p>                   
                        <a href="{{URL::to('/add-category')}}" class="btn-outline-light btn btn-primary">Thêm danh mục sản phẩm</a>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Introduction</label>
                        <textarea style="resize: none" rows="4" id="inputText3" class="form-control" name="book_introduction"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Description</label>
                        <textarea id="inputText3" style="resize: none" rows="8"  class="form-control" name="book_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Price Unit</label>
                        <input id="inputText3" type="text" class="form-control" name="book_priceunit">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Sale</label>
                        <input id="inputText3" type="text" class="form-control" name="book_sale">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Price Sale</label>
                        <input id="inputText3" type="text" class="form-control" name="book_pricesale">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantity</label>
                        <input id="inputText3" type="text" class="form-control" name="book_quantity">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantity Buy</label>
                        <input id="inputText3" type="text" class="form-control" name="book_quantitybuy">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Ảnh của sản phẩm</label>
                        <input id="inputText3" type="file" class="form-control" name="book_img">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Trạng thái</label>
                        <select class="custom-select" class="form-control" name="book_status">
                            <option selected value="0">Còn hàng</option>
                            <option value="1">Hết hàng</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm tác giả</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection