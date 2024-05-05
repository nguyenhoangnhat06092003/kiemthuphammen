<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hóa đơn thanh toán</title>
    <link rel="stylesheet" href="{{ base_path('public/css/pdf.css') }}">
</head>

<body>
    <h1 class="logo">SOREA</h1>
    <div class="header">
        <div class="header_left">
            <div>
                <h3>Sorea</h3>
                <p>Số điện thoại:  028 3827 2372</p>
                <p>Email: SoraeRestaurant@gmail.com</p>
                <p>Giờ mở cửa: 11:00 AM - 22:00 PM</p>
            </div>
        </div>
        <div class="header_right">
            <h3>Thông tin khách hàng</h3>
            <p>Tên khách hàng: {{$order->fullName}}</p>
            <p>Số điện thoại: {{$order->phone}}</p>
            <p>Email: {{$order->email}}</p>
        </div>
    </div>
    <hr />
    <div>
        <div>
            <h1 class="title">HÓA ĐƠN THANH TOÁN</h1>
            <p>Tên dịch vụ: {{$order->service_name}}</p>
            <p>Số khách hàng: {{$order->peopleNumber}}</p>
            <p>Bảng thông tin món ăn gồm:</p>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Món ăn</th>
                    <th>Giá</th>
                </tr>
                @foreach ($order_foods as $order_food)
                <tr class="even pointer">
                    <td class="align-items-center ">{{ ++$i }}</td>
                    <td class="align-items-center ">{{ $order_food->food->name }}</td>
                    <td class="align-items-center ">{{ number_format($order_food->food->price, 0) }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <hr />
        <h3>Tổng tiền: {{$total_price}}</h3>
    </div>
    <p>Hóa đơn in ngày: {{ \Carbon\Carbon::now()->toDateString() }}</p>
    <p class="thanks">Cảm ơn quý khách!</p>
</body>

</html>