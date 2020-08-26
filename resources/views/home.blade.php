@extends('layouts.masterLayout')
@section('start')
    Dashboard
    {{--<small>Create Establishmnet</small>--}}
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div style="margin-bottom: 10px; float: right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Choose</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" onclick="getDashBoardBookings('Daily')">Daily</a></li>
                            <li><a href="#" onclick="getDashBoardBookings('Weekly')">Weekly</a></li>
                            <li><a href="#" onclick="getDashBoardBookings('Monthly')">Monthly</a></li>
                            <li><a href="#" onclick="getDashBoardBookings('Yearly')">Yearly</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Small boxes (Stat box) -->
{{--        <div class="row">--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <div class="info-box">--}}
{{--                    <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-o"></i></span>--}}

{{--                    <div class="info-box-content">--}}
{{--                        <span class="info-box-text">Total Bookings</span>--}}
{{--                        <span class="info-box-number">11112</span>--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box-content -->--}}
{{--                </div>--}}
{{--                <!-- /.info-box -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <div class="info-box">--}}
{{--                    <span class="info-box-icon bg-green"><i class="fa fa-calendar-plus-o"></i></span>--}}

{{--                    <div class="info-box-content">--}}
{{--                        <span class="info-box-text">Todays Booking</span>--}}
{{--                        <span class="info-box-number">12</span>--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box-content -->--}}
{{--                </div>--}}
{{--                <!-- /.info-box -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <div class="info-box">--}}
{{--                    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-minus-o"></i></span>--}}

{{--                    <div class="info-box-content">--}}
{{--                        <span class="info-box-text">Last Week</span>--}}
{{--                        <span class="info-box-number">112</span>--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box-content -->--}}
{{--                </div>--}}
{{--                <!-- /.info-box -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <div class="info-box">--}}
{{--                    <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>--}}

{{--                    <div class="info-box-content">--}}
{{--                        <span class="info-box-text">Last Month</span>--}}
{{--                        <span class="info-box-number">121</span>--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box-content -->--}}
{{--                </div>--}}
{{--                <!-- /.info-box -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3 class="airballoon">{{count($user)}}</h3>

                        <p>User</p>
                        {{--<span style="margin-left: 10px;" class="label label-warning pull-right">Left for today {{$paxDetails}}/50</span>--}}
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-basketball-outline"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3 class="carRental">{{count($attendance)}}</h3>

                        <p>Attendace</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 class="restBooking">{{count($employee)}}</h3>

                        <p>Employee</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 class="tour">453</h3>

                        <p>Estimation</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-globe"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')

    var finishedBookings;
    var cancelledBookings;
    var areaChartData;
    $(function () {
    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: "#",
    type: "POST",

    success: function(response){
    var data=$.parseJSON(response);
    finishedBookings=data['finishedBookings'];
    cancelledBookings=data['cancelledBookings'];
    //areaChartData.datasets.push([finishedBookings,cancelledBookings],['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec']);
    areaChartData = {
    labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
    datasets: [
    {
    label               : 'Electronics',
    fillColor           : 'rgba(0,166,90, 1)',
    strokeColor         : 'rgba(0,166,90, 1)',
    pointColor          : 'rgba(0,166,90, 1)',
    pointStrokeColor    : '#00a65a',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(220,220,220,1)',
    data                : finishedBookings
    },
    {
    label               : 'Digital Goods',
    fillColor           : 'rgba(60,141,188,0.9)',
    strokeColor         : 'rgba(60,141,188,0.8)',
    pointColor          : '#3b8bba',
    pointStrokeColor    : 'rgba(60,141,188,1)',
    pointHighlightFill  : '#fff',
    pointHighlightStroke: 'rgba(60,141,188,1)',
    data                : cancelledBookings
    }
    ]
    }
    console.log(areaChartData.datasets);
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#FF0000'
    barChartData.datasets[1].strokeColor = '#FF0000'
    barChartData.datasets[1].pointColor  = '#FF0000'
    var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
    }
    });

  });



   function getDashBoardBookings(value){
        var getValue=value;
        $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "#",
        type: "POST",
        data: {getValue : getValue},

        success: function(response){
               var data=$.parseJSON(response);
               $('.airballoon').text(data['totalAirbaloonForToday']);
               $('.carRental').text(data['carRental']);
               $('.restBooking').text(data['totalRestBooking']);
               $('.dailybookings').text(data['totalBookings']);
               $('.cancelledBookings').text(data['totalBookingsCancelled']);
               $('.finishedBookings').text(data['totalBookingFinished']);
               $('.unfinishedBookings').text(data['totalBookingUnFinished']);
        }
         });
   }
   $(function () {
   var getValue=$('#selectDate').val();
    getDailyPax(getValue);
   });
   $(document).on('change','#selectDate',function(){
   var getValue=$(this).val();
    getDailyPax(getValue);
   });
   function getDailyPax(getValue)
   {
   $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "",
        type: "POST",
        data: {getValue : getValue},

        success: function(response){
               $('#totalUsed').text(response);

        }
         });
   }
@endsection

