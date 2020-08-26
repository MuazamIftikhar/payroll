@extends('layouts.masterLayout')
@section('start')
    Account
    <small>Update Staff</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Booking Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form class="form" method="POST" action="{{route('update_user',["id" => $user->user_col_id ])}}">
                            @csrf

                            <div class="box-body">
                                @if (session('error'))
                                    <div class="alert alert-error" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('error') }}</strong>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" id="Name" value="{{$user->user_name}}" name="Name" placeholder="Enter Name">
                                        @if ($errors->has('Name'))
                                            <span class="danger">{{$errors->first('Name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Number">Mobile Number</label>
                                        <input type="text" class="form-control" id="Number" value="{{$user->number}}" name="Number" placeholder="Enter Number">
                                        @if ($errors->has('Number'))
                                            <span class="danger">{{$errors->first('Number')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Staff">Email</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" id="Email" name="Email" placeholder="email@something.com">
                                        @if ($errors->has('Email'))
                                            <span class="danger">{{$errors->first('Email')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Password</label>
                                        <input type="text" class="form-control" value="{{old('Password')}}" id="Password" name="Password" placeholder="Password">
                                        @if ($errors->has('Password'))
                                            <span class="danger">{{$errors->first('Password')}}</span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Password_confirmation">Confirm Password</label>
                                            <input type="text" class="form-control" value="{{old('Password_confirmation')}}" id="Password_confirmation" name="Password_confirmation" placeholder="Password">
                                            @if ($errors->has('Password_confirmation'))
                                                <span class="danger">{{$errors->first('Password_confirmation')}}</span>
                                            @endif
                                        </div>
                                    </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </form>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </section>

@endsection
@section('script')
@endsection

