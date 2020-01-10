<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Central Protection Service</title>

    <style>
        body{
            font-family: 'Roboto', sans-serif !important;

        }
        .vertical-align-middle {
            vertical-align: bottom;
        }
        .icon-align-left
        {
            float: left;

        }
        .icon-font
        {
            font-size: 55px;
        }
        .icon-text-align-right
        {
            float: right;
        }
        .bg-navbar
        {
            background-color: #900C3F !important;
            border: #900C3F !important;
        }
        .newColorText
        {
            color:  #900C3F !important;
        }
        body {
            background: #e2e1e0;

        }

        .card {
            background: #fff;
            border-radius: 2px;
            display: inline-block;
            margin: 1rem;
            position: relative;

        }

        .card-1 {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .card-1:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

        .card-2 {
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        }

        .card-3 {
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }

        .card-4 {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

        .card-5 {
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        }
        .btn {
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: transparent;
            border: 2px solid #900C3F;
            border-radius: 0.6em;
            color: #900C3F;
            cursor: pointer;
            display: flex;
            align-self: center;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1;
            margin: 20px;
            padding: 1.2em 2.8em;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        .btn:hover, .btn:focus {
            color: #fff;
            outline: 0;
        }

        .first {
            transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
        }
        .first:hover {
            box-shadow: 0 0 40px 40px #900C3F inset;
        }


    </style>
</head>
<body class="bg-white" >
<div align="center">
    <div class="card card-3" style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)!important; border: 1px solid #900C3F" align="left" >

        <div  class="bg-navbar" style="color:white; padding: 5px"><h3>Welcome</h3></div>
        <div  align="left" style="padding: 10px">
            <div>
                <img src="{{URL::asset('public/images/aa.png')}}" width="100">
                <div style="float:right; text-align: center">
                    <h5 class="font-weight-bold" >Payroll</h5>
                    <h5 class="font-weight-bold" style="margin-top: -25px">#Address</h5>
                    <h6 style="margin-top: -25px">1-888-401-9555 | 587-401-3838</h6>
                    <h6 style="margin-top: -25px">info@payroll.com | payroll.pa</h6>

                </div>
            </div>


            <p>Your account has been successfully created.</p>
            <h4>Web Login</h4>
            <p>User Name <b>{{$demo->username}}</b></p>
            <p>Passowrd <b>{{$demo->password}}</b></p>
            {{--<div align="center">--}}
            {{--<a href="{{$demo->path_pdf}}"  class="btn first">View Contract</a>--}}
            {{--</div>--}}
            <div align="right">
                Thank You,
                <br/>
                <i>Payroll</i>
            </div>

        </div>

    </div>
</div>


</body>
</html>
