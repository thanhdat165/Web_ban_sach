<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .order-detail {
            display: flex;
        }
        .title-order {
            text-transform: uppercase;
            font-size: 14px;
            margin-left: 420px;
        }

        .name-shop {
            text-transform: uppercase;
        }

        .address-shop {
            margin-top: -40px;
            margin-left: 40px;
            font-size: 18px;
        }

        .name-order {
            margin-top: -50px;
        }

        .font-order {
            font-size: 20px;
        }

        table, th, td {
            border: 1px solid #000;
            text-align: center;
        }

        table{
            border-collapse:collapse;
        }

        .detail-table .name-book {
            width: 250px;
        }

        .detail-table .money {
            width: 150px;
        }

        .detail-table .total-money {
            width: 200px;
        }

        .sum {
            padding-left: 450px;
            font-size: 20px;
        }

        .time {
            margin-top: 10px;
            padding-left: 430px;
            font-style: italic;
            font-size: 20px;
        }

        .customer {
            margin-top: 5px;
            padding-left: 480px;
            font-size: 20px;
        }

    </style>
    <title>Đây là file pdf chi tiết hóa đơn</title>
</head>
<body>
    <?php   
        global $sum;
    ?>
    @foreach($detail_order1 as $key => $value)
    <div class="order-detail">
        <div>
            <div class="name-shop"><h3>Shop bán sách online</h3></div>
            <div class="address-shop"><h4>Địa chỉ: ĐH CNTT</h4></div>
        </div>
        <div>
            <div class="title-order"><h2>Hóa đơn bán hàng</h2></div>
        </div>
    </div>
    <div class="name-order font-order"><span class="subname">Tên khách hàng:</span> 
        @foreach($all_customer1 as $key=>$value1)
            @if($value->CustomerID == $value1->CustomerID)
                {{$value1->CustomerName}}
            @endif
        @endforeach
    </div>
    <div class="address-order font-order">Địa chỉ: {{$value->Address}},
        @foreach($all_district1 as $key=>$value2)
            @if($value->DistrictID == $value2->DistrictID)
                {{$value2->DistrictName}},
            @endif
        @endforeach
        @foreach($all_province1 as $key=>$value3)
            @if($value->ProvinceID == $value3->ProvinceID)
                {{$value3->ProvinceName}}
            @endif
        @endforeach 
    </div> 
    <div class="phone-order font-order"><span class="subname">Số điện thoại:</span>
        @foreach($all_customer1 as $key=>$value1)
            @if($value->CustomerID == $value1->CustomerID)
                {{$value1->PhoneNumber}}
            @endif
        @endforeach
    </div> 
    <div class="table-order">
        <table class="detail-table">
        <tr>
            <th>STT</th>
            <th class="name-book">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th class="money">Giá bán</th>
            <th class="total-money">Thành tiền</th>
        </tr>
        @foreach($all_orderdetail1 as $key=>$value4)
        <tr>
            <td>
                @if($value->OrderID == $value4->OrderID)
                    {{$value4->OrderID}}
                @endif
            </td>
            <td>
                @foreach($all_book1 as $key=>$value5)
                    @if($value4->BookID == $value5->BookID)
                        {{$value5->BookName}}
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
                    {{number_format($value4->Price,2)}}đ
                @endif
            </td>
            <td>
                @if($value->OrderID == $value4->OrderID)
                    {{number_format($value4->Price * $value4->Quantity,2)}}đ
                @endif
            </td>
        </tr>
        @endforeach
        </table>
        @foreach($detail_order1 as $key => $value)
            @foreach($all_orderdetail1 as $key=>$value4)
                @if($value->OrderID == $value4->OrderID)
                    <?php $sum = $sum + ($value4->Price * $value4->Quantity)?>
                @endif 
            @endforeach
        @endforeach
        <div class="sum"><span class="subname">Tổng cộng: {{number_format($sum, 2)}}đ</span></div>
        <div class="sum"><span class="subname">Phí vận chuyển: {{number_format($value->PriceShip,0)}}đ</span></div>
        <div class="sum"><span class="subname">Thành tiền: {{number_format($sum - $value->PriceShip,2)}}đ</span></div>
    </div>
    @endforeach
    <div class="time">Ngày....tháng....năm 20....</div>
    <div class="customer">Người bán hàng</div>
</body>
</html>