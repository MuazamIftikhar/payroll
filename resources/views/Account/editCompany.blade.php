@extends('layouts.masterLayout')

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
                                    <label for="Number">Phone Number</label>
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
                                    <label for="Hotel">Role</label>
                                    <select class="form-control" name="Role">
                                        <option value="">--Select Role--</option>
                                        @foreach($roles as$r)
                                            <option {{$r->id == $user->role_id? 'selected' : ''}} value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('Role'))
                                        <span class="danger">{{$errors->first('Role')}}</span>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control"  value="{{$user->companyName}}" name="companyName" placeholder="Enter Company Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->City}}" name="City" placeholder="Enter City" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">District</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->District}}" name="District" placeholder="Enter District" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">State</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->State}}" name="State" placeholder="Enter State" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pin Code</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->Pin}}" name="Pin" placeholder="Enter Pin Code" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->Address}}" name="Address" placeholder="Enter Address" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Est Type</label>
                                        <select class="form-control" name="EstType">
                                            <option {{ $user->EstType ==  "Company" ? 'selected' : ''}}>Company</option>
                                            <option {{ $user->EstType ==  "Contractor" ? 'selected' : ''}}>Contractor</option>
                                            <option {{ $user->EstType ==  "Both" ? 'selected' : ''}}>Both</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">OwnerShip Type</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" value="{{$user->ownershipType}}" name="ownershipType" placeholder="Enter Type" />
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

