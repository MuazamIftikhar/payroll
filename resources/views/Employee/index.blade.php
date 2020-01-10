@extends('layouts.masterLayout')
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
                            <p><small>Owner</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-4">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                            <p><small>Doccument</small></p>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="Name" placeholder="Enter  Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Father Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="fatherName" placeholder="Enter Father Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="lastName" placeholder="Enter Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Of Birth</label>
                                        <input type="date" required="required" class="form-control" name="DOB"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Of Joining</label>
                                        <input type="date" required="required" class="form-control" name="DOJ"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="Gender" value="Male" checked="">
                                                Male
                                            </label>
                                            <label>
                                                <input type="radio" name="Gender" value="Female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Religion</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="Religion" placeholder="Enter Religion" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="Phone" placeholder="Enter Phone" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input maxlength="100" type="email" required="required" class="form-control" name="Email" placeholder="Enter Email" />
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Present Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address</label>
                                        <input type="text" required="required" class="form-control" name="streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State</label>
                                        <input type="text" required="required" class="form-control" name="State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code</label>
                                        <input type="text" required="required" class="form-control" name="zipCode"/>
                                    </div>
                                </div>
                            </div>
                            <h4 class="box-title">Permanent Address</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Street Address</label>
                                        <input type="text" required="required" class="form-control" name="per_streetAddress" placeholder="Enter Street Address" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="per_City" placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Enter State</label>
                                        <input type="text" required="required" class="form-control" name="per_State"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal / Zip code</label>
                                        <input type="text" required="required" class="form-control" name="per_zipCode"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Designation</label>
                                        <input type="text" required="required" class="form-control" name="Designation"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input type="text" required="required" class="form-control" name="companyName"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Marital Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="Status" value="Married" checked="">
                                                Married
                                            </label>
                                            <label>
                                                <input type="radio" name="Status" value="Unmarried">
                                                Unmarried
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
                            <h3 class="box-title">Destination</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Name</label>
                                        <input type="text" required="required" class="form-control" name="bankName" placeholder="Enter Bank Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Account Number</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="accountNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">ISFC Code</label>
                                        <input type="text" required="required" class="form-control" name="ISFC" placeholder="Enter ISFC" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Check Book</label>
                                        <input type="file" required="required" class="form-control" name="checkBook"/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Employee Esic Number</label>
                                        <input type="text" required="required" class="form-control" name="esicNumber"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Emplyee PF/UAN Number</label>
                                        <select class="form-control"  name="UAN">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Esic Flag</label>
                                        <select class="form-control"  name="esicFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PT Flag</label>
                                        <select class="form-control"  name="PTFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Saturating Ceilling</label>
                                        <select class="form-control"  name="PFSaturating">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">PF Flag</label>
                                        <select class="form-control"  name="PFFlag">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name as Adhar</label>
                                        <input type="text" required="required" class="form-control" name="NameAsAdhar" placeholder="Enter Adhar Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Adhar Number</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="adharNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Adhar Proof</label>
                                        <input maxlength="100" type="file" required="required" class="form-control" name="adharProof" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Name as Pan</label>
                                        <input type="text" required="required" class="form-control" name="NameAsPan" placeholder="Enter Pan Name" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Pan Number</label>
                                        <input maxlength="100" type="text" required="required" class="form-control" name="panNumber" placeholder="Enter Number" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Pan Proof</label>
                                        <input maxlength="100" type="file" required="required" class="form-control" name="panProof" />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                        </div>
                    </div>

                    <div class="box box-primary setup-content" id="step-3">
                        <div class="box-header">
                            <h3 class="box-title">Personal Details</h3>
                        </div>
                        <div class="box-body">
                            <div id="po">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            <input type="text" required="required" class="form-control" name="family_firstName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" required="required" class="form-control" name="family_lastName[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Relation</label>
                                            <select class="form-control"  name="family_Relation[]">
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
                                            <label class="control-label">Present Address</label>
                                            <input type="text" required="required" class="form-control" name="family_presentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Permanent Address</label>
                                            <input type="text" required="required" class="form-control" name="family_permanentAddress[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nominee / Family Member</label>
                                            <select class="form-control"  name="family_Nominee[]">
                                                <option>Nominee</option>
                                                <option>Family Address</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Date of Birth</label>
                                            <input type="date" required="required" class="form-control" name="family_DOB[]"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Adhar Number</label>
                                            <input type="text" required="required" class="form-control" name="family_adharNumber[]"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn  btn-info btn-flat remove-btn" id="appendRow">Add </button>


                            <div id="appendDiv"></div>


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

