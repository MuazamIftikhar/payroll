<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Suli Travel</title>
    <script>window.csrfToken = "{{csrf_token()}}"</script>
    <link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{URL::asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('bower_components/select2/dist/css/select2.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://kit.fontawesome.com/237f4cac36.js"></script>

    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<style>
    #example1 td
    {
        text-align: center;
        vertical-align: middle;
        border: 1px solid lightgray;

    }

    .danger {
        font-size: 90%;
        color: #c7254e;
    }
    .text-required
    {
        color: #ff0000 !important;
        font-size: 15px;
    }
.select2-container--default .select2-selection--single {
    border-radius:0 !important;

}
    .select2-container .select2-selection--single {
       height: 34px !important;
    }

    .user-panel > .image > img {
        width: 100%;
        max-width: 45px !important;
        height: 45px !important;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 400 !important;
    }

    .color-green {
        color: #00a65a !important;
    }

    .form-control.has-error, .form-control.has-error {
        border-color: #dd4b39;
        box-shadow: none;
    }

    .help-block {
        color: #dd4b39;
    }

    .multiselect__tags {
        border-radius: 0 !important;
    }

    .vdatetime-input {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        /* font-size: 14px; */
        /* line-height: 1.42857143; */
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 0px;

    }

    .vdatetime-popup__header {
        background: #00a65a !important;
    }

    .vdatetime-year-picker__item--selected,
    .vdatetime-time-picker__item--selected,
    .vdatetime-popup__actions__button {
        color: #00a65a !important;
    }

    .profile-user-img {
        width: 100px;
        height: 100px;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Suli </b>Travel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <form method="post" action="{{route('logout')}}">
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="nav-item">
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-car"></i> <span> Pick & Drop</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('booking')}}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
                        <li><a href="{{route('manageBooking')}}"><i class="fa fa-circle-o"></i> Manage Booking</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ship"></i> <span> Transfer Booking</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('transferBooking')}}"><i class="fa fa-circle-o"></i> Add Booking</a></li>
                        <li><a href="{{route('manageTransfer')}}"><i class="fa fa-circle-o"></i> Manage Booking</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-send-o"></i> <span> Hot Airballoon</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('Airbalon')}}"><i class="fa fa-circle-o"></i> Add Airballoon</a></li>
                        <li><a href="{{route('manageAirbalon')}}"><i class="fa fa-circle-o"></i> Manage Airballoon</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span> User</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('create_user')}}"><i class="fa fa-circle-o"></i> Add User</a></li>
                        <li><a href="{{route('manage_user')}}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        @yield('content')

    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="https://cybermeteros.com">Cyber Meteors</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Morris.js charts -->
<script src="{{URL::asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('bower_components/morris.js/morris.min.js')}}"></script>


<!-- Sparkline -->
<script src="{{URL::asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{URL::asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{URL::asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{URL::asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>

<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements

        $.widget.bridge('uibutton', $.ui.button);
    });
    $('.select2').select2();
    $('[data-mask]').inputmask();
    $(document).on('focus','.dob', function() {
        $(this).inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' });
    });
    $('.dob').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' });
    //Red color scheme for iCheck
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //$(document).on('focus',".datepicker", function(){ //bind to all instances of class "date".
        $('.datepicker').datepicker({
            autoclose:true,
            orientation: "bottom",
            startDate: '-100y',
            format: "yyyy-mm-dd"
        });
   // });
    var favorite = [];
    var length;
    $('#example1 tbody').on( 'click', "input[type='checkbox']", function () {
        favorite=[];
        $.each($('input[type="checkbox"]:checked'), function(){
            favorite. push($(this). val());
        });
       // alert($('#totalSelected').text());
        $('.totalSelected').text(favorite.length);
        $('.selectedArray').attr('value',favorite);
    });
    $('#selectAll').click(function(e){
        favorite=[];
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
        $.each($('input[type="checkbox"]:checked'), function(){
            favorite. push($(this). val());
        });
        $('.totalSelected').text(favorite.length - 1 == -1 ? 0 : favorite.length - 1);
        $('.selectedArray').attr('value',favorite);
    });
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'select':'multi',
            'autoWidth': false,
        })
    });

    @yield('script')
</script>
</body>
</html>
