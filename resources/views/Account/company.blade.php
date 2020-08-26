@extends('layouts.masterLayout')

@section('start')
    Account
    <small>Create Establishmnet</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Establishment</h3>
                    </div>
                    <form class="form" method="POST" action="{{route('save_account')}}">
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

                            <div  id="po">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Establishment Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="companyName[]" placeholder="Enter Establishment Name" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="Address[]" placeholder="Enter Address" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">City</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" name="City" placeholder="Enter City" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">District</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" name="District" placeholder="Enter District" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">State</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" name="State" placeholder="Enter State" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Pin Code</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" name="Pin" placeholder="Enter Pin Code" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Number">Mobile Number</label>
                                    <input type="text" class="form-control" id="Number" value="{{old('Number')}}" name="Number" placeholder="Enter Number">
                                    @if ($errors->has('Number'))
                                        <span class="danger">{{$errors->first('Number')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Staff">Email</label>
                                    <input type="email" class="form-control" value="{{old('Email')}}" id="Email" name="Email" placeholder="email@something.com">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Owner Name</label>
                                    <input type="text" class="form-control" id="Name" value="{{old('Name')}}" name="Name" placeholder="Enter Name">
                                    @if ($errors->has('Name'))
                                        <span class="danger">{{$errors->first('Name')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Hotel">Role</label>
                                    <select class="form-control" name="Role">
                                        <option value="">--Select Role--</option>
                                        @foreach($users as$r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('Role'))
                                        <span class="danger">{{$errors->first('Role')}}</span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Est Type</label>
                                    <select class="form-control" id="EstType" name="EstType">
                                        <option>Company</option>
                                        <option>Contractor</option>
                                        <option>Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">OwnerShip Type</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" name="ownershipType" placeholder="Enter Type" />
                                </div>
                            </div>
                                <div class="col-md-12">
                                <button type="button" class="btn  btn-info btn-flat remove-btn hidden appendRow" id="appendRow">Add </button>
                                </div>

                                <div id="appendDiv"></div>
                        </div>




                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </section>

@endsection
@section('script')
    $(document).ready(function() {
    $(document).on('change','#EstType',function() {
    var est=$('#EstType').val();

    if(est == "Contractor" || est == "Both"){
    $('.appendRow').removeClass('hidden');
    }else{
    $('.appendRow').addClass('hidden');
    }
    });

    $(document).on('click','.appendRow',function(){
    $(" <div class=\"col-md-6\">\n" +
        "                                <div class=\"form-group\">\n" +
        "                                    <label class=\"control-label\">Establishment Name</label>\n" +
        "                                    <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"companyName[]\" placeholder=\"Enter Establishment Name\" />\n" +
        "                                </div>\n" +
        "                            </div>\n" +
        "                            <div class=\"col-md-6\">\n" +
        "                                <div class=\"form-group\">\n" +
        "                                    <label class=\"control-label\">Address</label>\n" +
        "                                    <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"Address[]\" placeholder=\"Enter Address\" />\n" +
        "                                </div>\n" +
        "                            </div>").insertAfter("#appendDiv");

    });
    });
@endsection

