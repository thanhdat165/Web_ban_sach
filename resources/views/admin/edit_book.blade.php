@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Sửa danh mục sách</h3>
            <!-- <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p> -->
        </div>
        <div class="card">
            <h5 class="card-header">Danh mục sách</h5>
            @foreach($edit_book as $key => $value)
            <div class="card-body">
                <form method="post" action="{{URL::to('/update-book/'.$value->BookID)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên sách</label>
                        <input id="inputText3" type="text" class="form-control" name="book_name" value="{{$value->BookName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên tác giả</label>
                        <select class="custom-select" class="form-control" name="book_authorname">
                            @foreach($edit_book1 as $key => $value1)
                                <option value="{{$value1->AuthorID}}">{{$value1->AuthorName}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên nhà cung cấp</label>
                        <select class="custom-select" class="form-control" name="book_producername">
                            @foreach($edit_book2 as $key => $value2)
                                <option value="{{$value2->ProducerID}}">{{$value2->ProducerName}}</option>
                            @endforeach
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tên danh mục sản phẩm</label>
                        <select class="custom-select" class="form-control" name="book_categoryname">
                            @foreach($edit_book3 as $key => $value3)
                                <option value="{{$value3->CategoryID}}">{{$value3->CategoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Introduction</label>
                        <textarea id="inputText3" style="resize: none" rows="4" class="form-control" name="book_intro">{{$value->Introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Description</label>
                        <textarea id="inputText3" style="resize: none" rows="8" class="form-control" name="book_des">{{$value->Description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Price unit</label>
                        <input id="inputText3" type="text" class="form-control" name="book_priceunit" value="{{$value->PriceUnit}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Sale</label>
                        <input id="inputText3" type="text" class="form-control" name="book_sale" value="{{$value->Sale}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Price sale</label>
                        <input id="inputText3" type="text" class="form-control" name="book_pricesale" value="{{$value->PriceSale}}">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantity</label>
                        <input id="inputText3" type="text" class="form-control" name="book_quantity" value="{{$value->Quantity}}">
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantity buy</label>
                        <input id="inputText3" type="text" class="form-control" name="book_quantitybuy" value="{{$value->Quantity_buy}}">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="inputText3" class="col-form-label">Img</label>
                        <input id="inputText3" type="file" class="form-control" name="book_img" value="{{$value->Img}}">
                    </div> -->
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Book status</label>
                        <select class="custom-select" class="form-control" name="book_status">
                            <option value="0">Còn hàng</option>
                            <option value="1">Hết hàng</option>
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