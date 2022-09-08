<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <title>Chi tiết hóa đơn</title>
    <style>
        .order {
            width:50%;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #ccc;
            width: 1000px;
            height: 0 auto;
            background-color: #ccc;
            position: relative;
        }
        .header-order {
            color: red;
            text-align: center; 
        }
        .font-order {
            font-size: 20px;
        }
        .subname {
            font-weight: 700px;
        }

        table, th, td {
            border: 1px solid #000;
            text-align: center;
        }
        table{
            border-collapse:collapse;
        }

        .detail-table
        {
            margin-top: 10px;
            width: 996px;
        }

        .detail-table .name-book {
            width: 300px;
        }

        .detail-table .money {
            width: 200px;
        }

        .detail-table .total-money {
            width: 300px;
        }

        .opt-btn {
            position: absolute;
            display: flex;
            right: 0;     
        }

        .print-order{
            background-color: blue;  
            border-radius: 10px;   
            border: none;    
        }

        .cancel-order {
            background-color: red;
            border-radius: 10px; 
            border: none; 
        }
        
        .sum {
            padding-left: 695px;
        }
    </style>
</head>
<body style="background-color: pink;">
    <?php   
        global $sum;
    ?>
    @foreach($detail_order as $key => $value)
    <div class="order">
        <div class="header-order"><h1>CHI TIẾT HÓA ĐƠN</h1></div>
        <div class="name-order font-order"><span class="subname">Tên khách hàng:</span> 
            @foreach($all_customer as $key=>$value1)
                @if($value->CustomerID == $value1->CustomerID)
                    {{$value1->CustomerName}}
                @endif
            @endforeach
        </div> 
        <div class="phone-order font-order"><span class="subname">Số điện thoại:</span>
            @foreach($all_customer as $key=>$value1)
                @if($value->CustomerID == $value1->CustomerID)
                    {{$value1->PhoneNumber}}
                @endif
            @endforeach
        </div> 
        <div class="time-order font-order">Thời gian đặt hàng: {{$value->Create_at}}</div>
        <div class="address-order font-order">Địa chỉ: {{$value->Address}}
            @foreach($all_district as $key=>$value2)
                @if($value->DistrictID == $value2->DistrictID)
                    {{$value2->DistrictName}}
                @endif
            @endforeach
            @foreach($all_province as $key=>$value3)
                @if($value->ProvinceID == $value3->ProvinceID)
                    {{$value3->ProvinceName}}
                @endif
            @endforeach 
        </div> 
        <div class="detail-order">   
            <table class="detail-table">
                <tr>
                    <th>STT</th>
                    <th class="name-book">Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th class="money">Giá bán</th>
                    <th class="total-money">Thành tiền</th>
                </tr>
                @foreach($all_orderdetail as $key=>$value4)
                    <tr>
                        <td>
                            @if($value->OrderID == $value4->OrderID)
                                {{$value4->OrderID}}
                            @endif
                        </td>
                        <td>
                            @foreach($all_book as $key=>$value5)
                                @if($value->OrderID == $value4->OrderID)
                                    @if($value4->BookID == $value5->BookID)
                                        {{$value5->BookName}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($value->OrderID == $value4->OrderID)
                                {{$value4->Quantity}}
                            @endif
                        </td>
                        <td>
                            @if($value->OrderID == $value4->OrderID)
                                {{number_format($value4->Price/$value4->Quantity,2)}}đ
                            @endif
                        </td>
                        
                        <td>
                            @if($value->OrderID == $value4->OrderID)
                                {{number_format($value4->Price * $value4->Quantity/$value4->Quantity,2)}}đ
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            @foreach($detail_order as $key => $value)
                @foreach($all_orderdetail as $key=>$value4)
                    @if($value->OrderID == $value4->OrderID)
                        <?php $sum = $sum + ($value4->Price * $value4->Quantity/$value4->Quantity)?>
                    @endif 
                @endforeach
            @endforeach
            <div class="name-order font-order sum"><span class="subname">Tổng cộng: {{number_format($sum, 2)}}đ</span></div>
            <div class="name-order font-order sum"><span class="subname">Phí vận chuyển: {{number_format($value->PriceShip,0)}}đ</span></div>
            <div class="name-order font-order sum"><span class="subname">Thành tiền: {{number_format($sum - $value->PriceShip,2)}}đ</span></div>
        </div>
        <div class="opt-btn">
            <div class="print-order"><a href="{{URL::to('/print-order/'.$value->OrderID)}}" class="btn btn-outline-light" target="blank"><i class='fa fa-print'></i> In hóa đơn</a></div>
            <div class="cancel-order"><a href="{{URL::to('/all-order')}}" class="btn btn-outline-light"><i class='fa fa-window-close'></i> Hủy</a></div>
        </div>
    </div>
    @endforeach
</body>
</html>