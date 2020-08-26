@extends('layouts.masterLayout')
@section('start')
    Employee
    <small>Create Employee</small>
@endsection
@section('css')
    .stepwizard-step p {
    margin-top: 0px;
    color:#666;
    }
    .stepwizard-row {
    display: table-row;
    }
    .stepwizard {
    display: table;
    width: 100%;
    position: relative;
    }
    .stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
    }
    .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
    }
    .stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
    }
    .stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
    }
    .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
    }
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-box">
                        <div class="stepwizard-step col-xs-4">
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Personal Detail</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-4">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                            <p><small>Document</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-4">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                            <p><small>Family / Nominee </small></p>
                        </div>
                    </div>
                </div>

                <form class="form" method="POST" action="{{route('save_employee')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box box-primary setup-content" id="step-1">
                        <div class="box-header">
                            <h3 class="box-title">Personal Detail</h3>
                        </div>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name <span style="color: red" >*</span></label>
                                        <input  type="text" required="required" class="form-control" value="{{old('Name')}}" onkeypress="return /[a-z]/i.test(event.key)" name="Name" placeholder="Enter  Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Father Name <span style="color: red" >*</span></label>
                                        <input  type="text" required="required" class="form-control" value="{{old('fatherName')}}" onkeypress="return /[a-z]/i.test(event.key)" name="fatherName" placeholder="Enter Father Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Last Name <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('lastName')}}" onkeypress="return /[a-z]/i.test(event.key)" name="lastName" placeholder="Enter Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Of Birth <span style="color: red" >*</span></label>
                                        <input type="date" required="required" class="form-control" value="{{old('DOB')}}" name="DOB"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Joining Date <span style="color: red" >*</span></label>
                                        <input type="date" required="required"  class="form-control" value="{{old('DOJ')}}" name="DOJ"/>
                                    </div>
                                </div>
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Date of Leaving <span style="color: red" >*</span></label>--}}
                                        {{--<input type="date" required="required"  class="form-control" value="{{old('DOE')}}"  name="DOE"/>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Religion <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" value="{{old('Religion')}}" name="Religion" placeholder="Enter Religion" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number <span style="color: red" >*</span></label>
                                        <input maxlength="10" type="text"  class="form-control"  value="{{old('Phone')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   name="Phone" placeholder="Enter Phone" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email <span style="color: red" >*</span></label>
                                        <input   type="text" required class="form-control" value="{{old('Email')}}" name="Email" placeholder="Enter Email" />
                                        @if ($errors->has('Email'))
                                            <span class="help-block" role="alert">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Present Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address  <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('streetAddress')}}" id="streetAddress" name="streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" value="{{old('City')}}" name="City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter District <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('District')}}" name="District"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('State')}}" name="State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('zipCode')}}" name="zipCode" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Permanent Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address  <span style="color: red" >*</span> <a class="copyLink"> Same as Present</a></label>
                                        <input type="text" required="required" class="form-control" value="{{old('per_streetAddress')}}" id="per_streetAddress" name="per_streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" value="{{old('per_City')}}" name="per_City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter District <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('per_District')}}" name="per_District"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('per_State')}}" name="per_State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('per_zipCode')}}" name="per_zipCode" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Designation <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{old('Designation')}}" name="Designation"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Company Name <span style="color: red" >*</span></label>
                                        <select class="form-control"  name="companyName">
                                            @foreach($name as $n)
                                            <option value="{{$n->id}}" {{old('companyName') == $n->id ? "selected" : ""}}>{{$n->companyName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Marital Status <span style="color: red" >*</span></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="Status" value="Married" {{old('Status') == "Married" ? "checked" : ""}} checked="">
                                                Married
                                            </label>
                                            <label>
                                                <input type="radio" name="Status" value="Unmarried" {{old('Status') == "Unmarried" ? "checked" : ""}}>
                                                Unmarried
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Gender <span style="color: red" >*</span></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="Gender" value="Male" {{old('Gender') == "Male" ? "checked" : ""}} checked="">
                                                Male
                                            </label>
                                            <label>
                                                <input type="radio" name="Gender" value="Female" {{old('Gender') == "Female" ? "checked" : ""}}>
                                                Female
                                            </label>
                                            <label>
                                                <input type="radio" name="Gender" value="Transgender" {{old('Transgender') == "Male" ? "checked" : ""}}>
                                                Transgender
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>

                    <div class="box box-primary setup-content" id="step-2">
                        <div class="box-header">
                            <h3 class="box-title">Document</h3>
                        </div>
                        <div class="box-body">
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Employee Esic Number <span style="color: red" >*</span></label>
                                        <input type="text"  class="form-control" value="{{old('esicNumber')}}" maxlength="10" name="esicNumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Esic Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"   name="esicFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PT Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"  name="PTFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Emplyee PF/UAN Number</label>
                                        <input type="text" class="form-control" value="{{old('UAN')}}" name="UAN" placeholder="Enter UAN"  maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Statutory Ceiling <span style="color: red" >*</span></label>
                                        <select class="form-control"   name="PFSaturating">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"   name="PFFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">LWf Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"   name="LWFFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name As Per Bank <span style="color: red" >*</span></label>
                                        <input type="text"  class="form-control" value="{{old('bankName')}}" onkeypress="return /[a-z]/i.test(event.key)" name="bankName" placeholder="Enter Bank Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Account Number <span style="color: red" >*</span></label>
                                        <input   type="text"  class="form-control" maxlength="18" minlength="9" value="{{old('accountNumber')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="accountNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ISFC Code <span style="color: red" >*</span></label>
                                        <input type="text"  class="form-control" value="{{old('ISFC')}}" name="ISFC" maxlength="11" minlength="11" placeholder="Enter ISFC" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Pass Book / Cheque</label>
                                        <input type="file"  class="form-control" value="{{old('checkBook')}}" name="checkBook"  />
                                        @if ($errors->has('checkBook'))
                                            <span class="danger">{{$errors->first('checkBook')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name As Per Adhar <span style="color: red" >*</span></label>
                                        <input type="text" maxlength="12" class="form-control" value="{{old('NameAsAdhar')}}" onkeypress="return /[a-z]/i.test(event.key)" required="required" name="NameAsAdhar" placeholder="Enter Adhar Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Adhar Number <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" minlength="10" maxlength="12" class="form-control" value="{{old('adharNumber')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="adharNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Adhar Card</label>
                                        <input   type="file"  class="form-control" value="{{old('adharProof')}}" name="adharProof" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name As Per Pan <span style="color: red" >*</span></label>
                                        <input type="text"  class="form-control" value="{{old('NameAsPan')}}" name="NameAsPan" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Pan Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Pan Number <span style="color: red" >*</span></label>
                                        <input maxlength="6" type="text"  class="form-control" minlength="6" maxlength="10" value="{{old('panNumber')}}" maxlength="10"  name="panNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Pan Card</label>
                                        <input  type="file" class="form-control" value="{{old('panProof')}}" name="panProof" />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>

                    <div class="box box-primary setup-content" id="step-3">
                        <div class="box-header">
                            <h3 class="box-title">Family / Nominee Details</h3>
                        </div>
                        <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">First Name <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" name="family_firstName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Last Name <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" name="family_lastName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Relation <span style="color: red" >*</span></label>
                                            <select class="form-control" required   name="family_Relation[]">
                                                <option >Spouse</option>
                                                <option>Mother</option>
                                                <option>Father</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Present Address <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control"  name="family_presentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control"  name="familyPresentDistrict[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">State <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control"  name="familyPresentState[]"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Permanent Address <span style="color: red" >*</span> <a class="copyLink2"> Same as Present</a></label>
                                            <input type="text" required="required" class="form-control"  name="family_permanentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control"  name="familyPermanentDistrict[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">State <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control"  name="familyPermanentState[]"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nominee / Family Member <span style="color: red" >*</span></label>
                                        <select class="form-control" required name="family_Nominee[]">
                                            <option>Nominee</option>
                                            <option>Family Member</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth <span style="color: red" >*</span></label>
                                            <input type="date" required="required" class="form-control"  name="family_DOB[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Adhar Number <span style="color: red" >*</span></label>
                                            <input type="text" required="required" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control"  name="family_adharNumber[]" placeholder="Enter Adhar Number"/>
                                        </div>
                                    </div>
                                </div>

                            <button type="button" class="btn  btn-info btn-flat remove-btn" id="appendRow">Add Another Family Member</button>



                            <div id="appendDiv"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Name 1 <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"  name="Witness[]" placeholder="Enter Witness Name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Address 1 <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  name="witnessAddress[]" placeholder="Enter Witness Address"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Name 2 <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  name="Witness[]" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Witness Name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Address 2 <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  name="witnessAddress[]" placeholder="Enter Witness Address"/>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-success pull-right" type="submit">Finish!</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
@section('script')

    $(document).ready(function () {

    $( ".copyLink" ).click(function() {

    var previous=$("#streetAddress").val();
    $("#per_streetAddress").val(previous);
    });

    var navListItems = $('div.setup-box div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
    $item = $(this);

    if (!$item.hasClass('disabled')) {
    navListItems.removeClass('btn-success').addClass('btn-default');
    $item.addClass('btn-success');
    allWells.hide();
    $target.show();
    $target.find('input:eq(0)').focus();
    }
    });

    allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
    curStepBtn = curStep.attr("id"),
    nextStepWizard = $('div.setup-box div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    curInputs = curStep.find("input[type='text'],input[type='url']"),
    isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
    if (!curInputs[i].validity.valid) {
    isValid = false;
    $(curInputs[i]).closest(".form-group").addClass("has-error");
    }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-box div a.btn-success').trigger('click');
    });
    $(document).on('click','#appendRow',function(){
    $(' <div class="row">\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">First Name <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text"  class="form-control" name="family_firstName[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Last Name <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="family_lastName[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Relation <span style="color: red" >*</span> </label>\n' +
                '                                            <select class="form-control"  name="family_Relation[]">\n' +
                    '                                                <option>Spouse</option>\n' +
                    '                                                <option>Mother</option>\n' +
                    '                                                <option>Father</option>\n' +
                    '                                                <option>Other</option>\n' +
                    '                                            </select>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                </div>\n' +
    '                                <div class="row">\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Present Address <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="family_presentAddress[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">District <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="familyPresentDistrict[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">State <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="familyPresentState[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
    '                                <div class="row">\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Permanent Address <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="family_permanentAddress[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">District <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="familyPermanentDistrict[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">State <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="familyPermanentState[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                </div>\n' +
    '                                <div class="row">\n' +
        '\n' +
        '                                <div class="col-md-4">\n' +
            '                                    <div class="form-group">\n' +
                '                                        <label class="control-label">Nominee / Family Member <span style="color: red" >*</span> </label>\n' +
                '                                        <select class="form-control"  name="family_Nominee[]">\n' +
                    '                                            <option>Nominee</option>\n' +
                    '                                            <option>Family Address</option>\n' +
                    '                                        </select>\n' +
                '                                    </div>\n' +
            '                                </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Date of Birth <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="date" class="form-control" name="family_DOB[]"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                    <div class="col-md-4">\n' +
            '                                        <div class="form-group">\n' +
                '                                            <label class="control-label">Adhar Number <span style="color: red" >*</span> </label>\n' +
                '                                            <input type="text" class="form-control" name="family_adharNumber[]" placeholder="Enter Adhar Number"/>\n' +
                '                                        </div>\n' +
            '                                    </div>\n' +
        '                                </div>').insertAfter("#appendDiv");
    });
@endsection

