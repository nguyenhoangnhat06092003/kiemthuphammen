
@extends('admin.templates.admin-page')

@section('css')
    <!-- bootstrap-progressbar -->
    <link
        href="{{ asset('public/front-end/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/front-end/admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/front-end/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" 
      rel="stylesheet" type="text/css" />   
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="col-md-12" style="display: inline-block;"">
            <div class="tile_count">
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng người dùng</span>
                    <div class="count">
                        {{ $numberUser }}
                    </div>
                    <span class="count_bottom"><i class="green">3% </i> hôm qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px">Số lượng dịch vụ</span>
                    <div class="count">
                        {{ $numberService }}
                    </div>
                    
                    <span class="count_bottom"><i class="green">34% </i> hôm
                        qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng món ăn</span>
                    <div class="count">
                        {{ $numberFood }}
                    </div>
                    <span class="count_bottom"><i class="red">12% </i> hôm
                        qua</span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top" style="font-size: 20px"> Số lượng đơn đặt hàng</span>
                    <div class="count">
                        {{ $numberOrder }}
                    </div>
                    <span class="count_bottom"><i class="red">12% </i> hôm
                        qua</span>
                </div>
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <form autocomplete="off">
                    @csrf
                    <div class="row x_title">
                        <div class="col-md-6">
                             <h3>Thống kê doanh thu</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p>Từ ngày:</p> <input type="text" id="datepicker" class="date form-control" name="from_date">
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày:</p> <input type="text" id="datepicker2" class="date form-control" name="to_date">
                    </div>
                    <div class="col-md-2">
                        <input style="margin-top: 40px !important" type="button" 
                        id="btn-dashboard-filter" class="btn btn-primary btn-sm mt-3" value="Lọc kết quả" >
                    </div>
                    <div class="col-md-12">
                        <div id="chart" style="height: 200px;"></div>
                    </div>
                                        
                </form>
                <div class="table-responsive">  
                    <select id="locthang" name="monthselected">
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                    <input class="btn-primary locthang" type="submit" name="submit" value="Lọc"><br><br>
                    <div class="col-md-6">
                        <div class="col-md-2">
                        <form method="post" id="form_data_export">
                            @csrf
                         <input type="submit" name="export" class="btn btn-success" value="Xuất excel" /><br>
                        </form>
                        </div>  
                        <div class="col-md-2" >
                        <form method="post" id="form_data_export_pdf">
                            @csrf
                         <input type="submit" name="exportPDF" class="btn btn-danger" value="Xuất PDF" />
                        </form>
                        </div>  
                        </div>
                    <?php
                    if(isset($_POST['submit'])){
                        $month = $_POST['monthselected'];
                        $limit = ( isset($_GET['limit']) ) ? $_GET['limit'] : 5;
                        $page = ( isset($_GET['page']) ) ? $_GET['page'] : 1;
                        $links = ( isset($_GET['links']) ) ? $_GET['links'] : 7;
                        $query = "select * FROM statistic_revenue inner join users on statistic_revenue.id = users.id 
                        INNER JOIN orders on users.id = orders.id inner join services on orders.id = services.id
                         where organizationDate=$month";
                        $Paginator = new Paginator($query);
    
                        $results = $Paginator->getData($limit, $page);
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Người đặt </th>  
                             <th>Số lượng người</th>  
                             <th>Dịch vụ</th>  
                             <th>Ngày tổ chức</th> 
                             <th>Doanh thu</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($results->data); $i++) : ?>
                                <tr>
                                    <td><?php echo $results->data[$i]['fullName']; ?></td>
                                    <td><?php echo $results->data[$i]['peopleNumber']; ?></td>
                                    <td><?php echo $results->data[$i]['name']; ?></td>
                                    <td><?php echo $results->data[$i]['organizationDate']; ?></td>
                                    <td><?php echo $results->data[$i]['sumRevenues']; ?></td>
                                </tr>
                            <?php endfor; ?>   
                        </tbody>
                    </table>
                    <?php echo $Paginator->createLinks( $links, 'pagination' ); ?>
                    <?php }?>
                </div>
                    
                <form autocomplete="off">
                    @csrf
                    <div class="row x_title">
                        <div class="col-md-6">
                           <h3>Thống kê đơn đặt hàng theo dịch vụ</h3>
                        </div>
                    </div>
                    <select name="categoryId" id="categoryId" class="custom-select">
                        @foreach ($services as $service)
                          <option class="p-2" value="{{ $service->id }}">{{ $service->name }}</option>
                            
                        @endforeach
                    </select>
                    <div class="col-md-12">
                        <div id="chart1" style="height: 250px;"></div>
                    </div>          
                </form>
            </div>
        </div>
       


    
        <br />
    
   

   
   </div>  
    </div>
    <!-- /page content -->
@endsection
@section('js')


    <!-- Chart.js -->
    <script src="{{ asset('public/front-end/admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('public/front-end/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- Skycons -->
    <script src="{{ asset('public/front-end/admin/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('public/front-end/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('public/front-end/admin/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('public/front-end/admin/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/front-end/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{-- <script src=
    "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js">
    </script> 
    <script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>      
    <script src=
        "http://code.jquery.com/ui/1.11.4/jquery-ui.js">
    </script> --}}

<!---- --->
<script type="text/javascript">
    $('#datepicker').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
    $('#datepicker2').datepicker({  
        dateFormat: 'yy-mm-dd'
    });  
</script> 

<script type="text/javascript">
    $(document).ready(function(){
        var url = "{{route('order-export', '')}}"+"/"+1;
        var url_pdf = "{{route('export-pdf-by-month', '')}}"+"/"+1;
        $('#form_data_export').attr('action',url)
        $('#form_data_export_pdf').attr('action',url_pdf)

        var chart = new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'chart',
        lineColors: ['#819C79', '#fc8710', '#FF6541'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'date',
        ykeys: ['sumRevenues'],
        labels: ['Tổng doanh thu']
        });

        var chart1 = new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'chart1',
        lineColors: ['#104E8B', '#1C86EE'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'organizationDate',
        ykeys: ['number'],
        labels: ['Số lượng đơn hàng']
        });

        $('#btn-dashboard-filter').click(function(){
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            var serviceId = $('#categoryId').val();
            $.ajax({
                url:"{{URL::to('/filter-by-date')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token},
                success:function(data){
                    chart.setData(data);
                }
            });
            $.ajax({
                url:"{{URL::to('/filter-by-date1')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token, serviceId:serviceId},
                success:function(data){
                    chart1.setData(data);
                    // console.log(data);
                }
            });
        });

        $('.locthang').click(function(){
            var _token = $('input[name="_token"]').val();
            var month = $('select[name="monthselected"]').val();
            var url = "{{route('order-export', '')}}"+"/"+month;
            var url_pdf = "{{route('export-pdf-by-month', '')}}"+"/"+month;
            $('#form_data_export_pdf').attr('action',url_pdf)
           
            $.ajax({
                url:"{{URL::to('/filter-by-month')}}",
                method:"POST",
                dataType:"JSON",
                data:{month:month, _token:_token},
                success:function(data){
                    chart.setData(data);
                    $('#form_data_export').attr('action',url)
                }
            });
           
        });

        $('#categoryId').on('change', function(e) {
            e.preventDefault();
            // alert('khoa dz');
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            var serviceId = $('#categoryId').val();
            $.ajax({
                url:"{{URL::to('/filter-by-date1')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date, _token:_token, serviceId:serviceId},
                success:function(data){
                    chart1.setData(data);
                    // console.log(data);
                }
            })
        });
    });
</script>
@endsection
