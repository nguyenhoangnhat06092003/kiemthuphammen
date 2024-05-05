<div>
    <p>Kính gửi khách hàng: {{$order->fullName}} - {{$order->phone}} </p>
    <p>Chúng tôi xin gửi đến quý khách thông tin hóa đơn như sau: </p>
    <p>Cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của chúng tôi. Sorae rất vui khi được phục vụ quý khách. Hẹn gặp lại!</p>
</div>
<div>
    <table>
        <tr>
            <td>Tên dịch vụ đã đặt:</td>
            <td>{{$order->service_name}}</td>
        </tr>
        <tr>
            <td>Ngày tổ chức:</td>
            <td>{{$order->organizationDate}}</td>
        </tr>
        <tr>
            <td>Số lượng khách:</td>
            <td>{{$order->peopleNumber}}</td>
        </tr>
        <tr>
            <td>Thực đơn:</td>
            @foreach ($order_foods as $order_food)
        <tr class="even pointer">
            <td class="align-items-center ">{{ ++$i }}</td>
            <td class="align-items-center ">{{ $order_food->food->name }}</td>
            <td class="align-items-center ">{{ number_format($order_food->food->price, 0) }}</td>
        </tr>
        @endforeach
        <td>{{$order->foodName}}</td>
        </tr>
        <tr>
            <td>Tổng tiền:</td>
            <td>{{$total_price}}</td>
        </tr>
        <tr>
            <td>Ngày thanh toán:</td>
            <td>{{$order->updated_at}}</td>
        </tr>
        <tr>
            <td>Phương thức thanh toán:</td>
            <td>{{$order->payment_method_name}}</td>
        </tr>
    </table>
</div>
<div style="display: flex;flex-direction: row;">
    <div>
        <h1 style="color: skyblue; margin-right: 10px;">SORAE</h1>
    </div>
    <div>
        <h2>Sorae Japanese Restaurant</h2>
        <p>Số điện thoại: 0123456789</p>
        <p>Email: SoraeRestaurant@gmail.com</p>
        <p>Giờ mờ cửa: 11:00 sáng - 22:00 tối.</p>
    </div>
</div>