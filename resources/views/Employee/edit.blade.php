@extends('layouts.masterLayout')
@section('start')
    Employee
    <small>Manage Employee</small>
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
                            <p><small>Documnet</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-4">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                            <p><small>Family / Nominee</small></p>
                        </div>
                    </div>
                </div>
                @foreach($employee as $e)
                <form class="form" method="POST" action="{{route('update_employee',["id" => $e->id ])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box box-primary setup-content" id="step-1">

                        <div class="box-header">
                            <h3 class="box-title">Personal Detail</h3>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-error mt-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success mt-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name <span style="color: red" >*</span> <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" value="{{$e->Name}}" class="form-control" name="Name" placeholder="Enter  Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Father Name <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" value="{{$e->fatherName}}" name="fatherName" placeholder="Enter Father Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Last Name <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" value="{{$e->lastName}}" name="lastName" placeholder="Enter Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Of Birth <span style="color: red" >*</span></label>
                                        <input type="date" required="required" class="form-control" value="{{$e->DOB}}" name="DOB"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Joining Date <span style="color: red" >*</span></label>
                                        <input type="date" required="required" class="form-control" value="{{$e->DOJ}}" name="DOJ"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Date of Leaving <span style="color: red" >*</span></label>
                                    <input type="date" required="required" class="form-control" value="{{$e->DOE}}" name="DOE"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Religion <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control"  value="{{$e->Religion}}" name="Religion" placeholder="Enter Religion" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number <span style="color: red" >*</span></label>
                                        <input maxlength="10" type="text" required="required" class="form-control"  value="{{$e->Phone}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="Phone" placeholder="Enter Phone" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email <span style="color: red" >*</span></label>
                                        <input   type="email" required="required" class="form-control"  value="{{$e->Email}}" name="Email" placeholder="Enter Email" />
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Present Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->streetAddress}}" name="streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control"  value="{{$e->City}}" name="City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter District <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{$e->District}}" name="District"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->State}}" name="State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code <span style="color: red" >*</span></label>
                                        <input type="text" required="required" maxlength="6" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="{{$e->zipCode}}" name="zipCode"/>
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Permanent Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->per_streetAddress}}" name="per_streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control"  value="{{$e->per_City}}" name="per_City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter District <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{$e->per_District}}" name="per_District"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->per_State}}" name="per_State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->per_zipCode}}" name="per_zipCode"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Designation <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->Designation}}" name="Designation"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Company Name <span style="color: red" >*</span></label>
                                    <select class="form-control" name="companyName">
                                        @foreach($company as $n)
                                            <option value="{{$n->id}}"  {{$e->company_id == $n->id ? "selected" : ""}}>{{$n->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Marital Status <span style="color: red" >*</span></label>
                                        <div class="radio">
                                            <?php
                                            $status=$e->Status;
                                            ?>
                                               <label>
                                                    <input type="radio" name="Status" value="Married" {{$status=="Married" ? "checked" : ""}}>
                                                    Married
                                               </label>
                                               <label>
                                                    <input type="radio" name="Status" value="Unmarried" {{$status=="Unmarried" ? "checked" : ""}}>
                                                    Unmarried
                                               </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Gender <span style="color: red" >*</span></label>
                                        <div class="radio">
                                            <?php
                                            $gender=$e->Gender;
                                            ?>
                                            <label>
                                                <input type="radio" name="Gender" value="Male" {{$gender=="Male" ? "checked" : ""}}>
                                                Male
                                            </label>
                                            <label>
                                                <input type="radio" name="Gender" {{$gender=="Female" ? "checked" : ""}} value="Female">
                                                Female
                                            </label>
                                            <label>
                                                <input type="radio" name="Gender" {{$gender=="Transgender" ? "checked" : ""}} value="Transgender">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Employee Esic Number <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->esicNumber}}" name="esicNumber"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Esic Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"  value="{{$e->esicFlag}}"  name="esicFlag">
                                            <option {{$e->esicFlag=="Yes" ? "selected" : ""}}>Yes</option>
                                            <option {{$e->esicFlag=="No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PT Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"  value="{{$e->PTFlag}}"  name="PTFlag">
                                            <option {{$e->PTFlag=="Yes" ? "selected" : ""}}>Yes</option>
                                            <option {{$e->PTFlag=="No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Emplyee PF/UAN Number <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->UAN}}" name="UAN"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Statutory Ceiling <span style="color: red" >*</span></label>
                                        <select class="form-control"  value="{{$e->PFSaturating}}"  name="PFSaturating">
                                            <option {{$e->PFSaturating=="Yes" ? "selected" : ""}}>Yes</option>
                                            <option {{$e->PFSaturating=="No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"  value="{{$e->PFFlag}}"  name="PFFlag">
                                            <option {{$e->PFFlag=="Yes" ? "selected" : ""}}>Yes</option>
                                            <option {{$e->PFFlag=="No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">LWf Flag <span style="color: red" >*</span></label>
                                        <select class="form-control"    name="PFSaturating">
                                            <option {{$e->LWFFlag=="Yes" ? "selected" : ""}}>Yes</option>
                                            <option {{$e->LWFFlag=="No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name As Per Bank <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  value="{{$e->bankName}}" onkeypress="return /[a-z]/i.test(event.key)" name="bankName" placeholder="Enter Bank Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Account Number <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="{{$e->accountNumber}}" name="accountNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ISFC Code <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control"  maxlength="11"  minlength="11" value="{{$e->ISFC}}" name="ISFC" placeholder="Enter ISFC" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Pass Book / Cheque <span style="color: red" >*</span></label>
                                        <input type="file" class="form-control"  value="{{$e->checkBook}}" name="checkBook"/>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name as Per Adhar <span style="color: red" >*</span></label>
                                        <input type="text" required="required" maxlength="12" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"  value="{{$e->NameAsAdhar}}" name="NameAsAdhar" placeholder="Enter Adhar Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Adhar Number <span style="color: red" >*</span></label>
                                        <input   type="text" required="required" minlength="10" maxlength="12" class="form-control"  value="{{$e->adharNumber}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="adharNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Adhar Card</label>
                                        <input   type="file"  class="form-control"  value="{{$e->adharProof}}" name="adharProof" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name as Per Pan <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"  value="{{$e->NameAsPan}}" name="NameAsPan" placeholder="Enter Pan Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Pan Number <span style="color: red" >*</span></label>
                                        <input  type="text" required="required" minlength="6" maxlength="10" class="form-control"  value="{{$e->panNumber}}" name="panNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Upload Clear Pan Card</label>
                                        <input  type="file" class="form-control"  value="{{$e->panProof}}" name="panProof" />
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
                            <div id="po">
                                @php
                                $getIndexCount=count(json_decode($e->family_firstName));
                                $family_firstName=json_decode($e->family_lastName);
                                $family_lastName=json_decode($e->family_lastName);
                                $family_Relation=json_decode($e->family_Relation);
                                $family_presentAddress=json_decode($e->family_presentAddress);
                                $family_permanentAddress=json_decode($e->family_permanentAddress);
                                $family_adharNumber=json_decode($e->family_adharNumber);
                                $family_DOB=json_decode($e->family_DOB);
                                $family_Nominee=json_decode($e->family_Nominee);
                                $familyPresentState=json_decode($e->familyPresentState);
                                $familyPermanentState=json_decode($e->familyPermanentState);
                                $familyPermanentDistrict=json_decode($e->familyPermanentDistrict);
                                $familyPresentDistrict=json_decode($e->familyPresentDistrict);
                                $Witness=json_decode($e->Witness);
                                $witnessAddress=json_decode($e->witnessAddress);
                                    @endphp
                                @for($i=0 ; $i < $getIndexCount ; $i++)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">First Name <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"  value="{{$family_firstName[$i]}}" name="family_firstName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Last Name <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" onkeypress="return /[a-z]/i.test(event.key)"  value="{{$family_lastName[$i]}}" name="family_lastName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Relation <span style="color: red" >*</span></label>
                                            <select class="form-control"    name="family_Relation[]">
                                                <option>{{$family_Relation[$i]}}</option>
                                                <option>Spouse</option>
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
                                            <input type="text" required="required" class="form-control"  value="{{$family_presentAddress[$i]}}" name="family_presentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" value="{{$familyPresentDistrict[$i]}}"  name="familyPresentDistrict[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">State <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" value="{{$familyPresentState[$i]}}"  name="familyPresentState[]"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Permanent Address <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" value="{{$family_permanentAddress[$i]}}"  name="family_permanentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" value="{{$familyPermanentDistrict[$i]}}"  name="familyPermanentDistrict[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">State <span style="color: red" >*</span></label>
                                            <input type="text" required="required" class="form-control" value="{{$familyPermanentState[$i]}}"  name="familyPermanentState[]"/>
                                        </div>
                                    </div>
                                 </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nominee / Family Member <span style="color: red" >*</span></label>
                                            <select class="form-control"  name="family_Nominee[]">
                                                <option>{{$family_Nominee[$i]}}</option>
                                                <option>Nominee</option>
                                                <option>Family Member</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth <span style="color: red" >*</span></label>
                                            <input type="edit" required="required" class="form-control" value="{{$family_DOB[$i]}}"  name="family_DOB[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Adhar Number <span style="color: red" >*</span></label>
                                            <input type="text" required="required" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="{{$family_adharNumber[$i]}}" name="family_adharNumber[]"/>
                                        </div>
                                    </div>
                                </div>

                                @endfor
                            </div>
                            <button type="button" class="btn  btn-info btn-flat " id="appendRow">Add</button>

                            <div id="appendDiv"></div>
                            @for($i=0 ; $i < 2 ; $i++)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Name {{$i+1}} <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{$Witness[$i]}}" onkeypress="return /[a-z]/i.test(event.key)" name="Witness[]" placeholder="Enter Witness Name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Witness Address {{$i+1}} <span style="color: red" >*</span></label>
                                        <input type="text" required="required" class="form-control" value="{{$witnessAddress[$i]}}" name="witnessAddress[]" placeholder="Enter Witness Address"/>
                                    </div>
                                </div>
                            </div>
                            @endfor

                            <button class="btn btn-success pull-right" type="submit">Finish!</button>
                        </div>
                    </div>

                </form>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@section('script')

    $(document).ready(function () {

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
    $("#po").clone().insertAfter("#appendDiv");
    });



@endsection

