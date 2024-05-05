<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thống kê doanh thu tháng {{$month}}</title>
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>

<body>
  <h1 class="logo">SOREA</h1>
    <div class="header">
        <div class="header_left">
            <div>
                <h3>Sorea</h3>
                <p>Số điện thoại: 0123456789</p>
                <p>Email: SoraeRestaurant@gmail.com</p>
                <p>Giờ mở cửa: 11:00 AM - 22:00 PM</p>
                <h3>===========================================================</h3>
            </div>
        </div>
    <h4 align="center">Thống kê doanh thu tháng {{$month}}</h4>
    <table class="table" border="1" width="100%" style="border-collapse: collapse;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Người đặt</th>
            <th scope="col">Số lượng người</th>
            <th scope="col">Dịch vụ</th>
            <th scope="col">Ngày tổ chức</th>
            <th scope="col">Doanh thu</th>
          
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $get)
          <tr>
            <th scope="row"></th>
            <td>{{$get->User->fullName}}</td>
            <td>{{$get->peopleNumber}}</td>
            <td>{{$get->Service->name}}</td>
            <td>{{$get->organizationDate}}</td>
            @foreach($revenues as $key => $rev)
              @if($get->organizationDate==$rev->date)
              <td>{{$rev->sumRevenues}}</td>
              @endif
            @endforeach
            
          </tr>
          @endforeach
       
        </tbody>
      </table>
</body>
</html>