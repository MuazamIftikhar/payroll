@extends('layouts.masterLayout')
@section('start')
    Account
    <small>Create Establishmnet</small>
@endsection
@section('css')
    body {
    margin-top:30px;
    }
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
                                    <p><small>Address</small></p>
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

                <form class="form" method="POST" action="{{route('save_est')}}" enctype="multipart/form-data">
                    @csrf
                            <div class="box box-primary setup-content" id="step-1">
                                {{--<div class="box-header">--}}
                                    {{--<h3 class="box-title">Estimation</h3>--}}
                                {{--</div>--}}
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Establishment Name</label>
                                                <input maxlength="100" type="text" readonly class="form-control" value="{{$est->name}}" name="Phone" placeholder="Enter Phone" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Establishment Address</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="Factory" placeholder="Enter Factory" />
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input maxlength="100" type="text" readonly class="form-control" value="{{$est->City}}" name="City" placeholder="Enter City" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">District</label>
                                                    <input maxlength="100" type="text" readonly class="form-control" value="{{$est->District}}" name="District" placeholder="Enter District" />
                                                </div>
                                            </div>
                                        </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">State</label>
                                                <input maxlength="100" type="text" readonly class="form-control" value="{{$est->State}}" name="State" placeholder="Enter State" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Pin Code</label>
                                                <input maxlength="100" type="text" readonly class="form-control" value="{{$est->Pin}}" name="Pin" placeholder="Enter Pin Code" />
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Est Type</label>
                                                    <input maxlength="100" type="text" readonly class="form-control" value="{{$est->EstType}}" name="Type" placeholder="Enter Est Type" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">OwnerShip Type</label>
                                                    <input maxlength="100" type="text" readonly class="form-control" value="{{$est->ownershipType}}" name="ownershipType" placeholder="Enter Type" />
                                                </div>
                                            </div>
                                        </div>
                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                </div>
                            </div>

                            <div class="box box-primary setup-content" id="step-2">
                                <div class="box-header">
                                    <h4 class="box-title">Owner/ Authorised Person</h4>
                                </div>
                                <div class="box-body">
                                  <div class="po">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="ownerName[]" placeholder="Enter  Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Mobile</label>
                                                <input maxlength="100" type="text" required="required" class="form-control"  name="ownerMobile[]"  placeholder="Enter Mobile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="ownerEmail[]" placeholder="Enter Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Pan Number</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="Pan[]" placeholder="Enter Pan Number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Remarks</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="ownerRemarks[]" placeholder="Enter Remarks" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Designation</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" name="Designation[]" placeholder="Enter Designation" />
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                    <button type="button" class="btn  btn-info btn-flat remove-btn" id="appendRow">Add Another Owner </button>


                                    <div id="appendDiv"></div>
                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                </div>
                            </div>

                            <div class="box box-primary setup-content" id="step-3">
                                <div class="box-header">
                                    <h3 class="box-title">Doccuments For Reminder</h3>
                                </div>
                                <div class="box-body">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Doc. Name Type</th>
                                            <th>Document Number</th>
                                            <th>Date of Applicable (DOA)</th>
                                            <th>Date of Expire (DOE)</th>
                                            <th>Date for Renewal/Reminder</th>
                                            <th>Doc. Upload</th>
                                            <th>Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Factory License</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="f_license_doccument" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="f_license_doa" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="f_license_doe" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="f_license_renewal" /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="f_license_doc_upload" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="f_license_remarks" /></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Labour Lic</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="l_lic_doccument" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="l_lic_doa" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="l_lic_doe" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="l_lic_renewal" /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="l_lic_doc_upload" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="l_lic_remarks" /></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>EPF Coverage Letter</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="EPF_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="EPF_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="EPF_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="EPF_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="EPF_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="EPF_remarks"  /></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>ESIC Code letter</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="ESIC_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="ESIC_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="ESIC_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="ESIC_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="ESIC_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="ESIC_remarks"  /></td>
                                           </tr>  <tr>
                                                <td>5</td>
                                                <td>PAN Card</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PAN_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PAN_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PAN_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PAN_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="PAN_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PAN_remarks"  /></td>
                                           </tr>  <tr>
                                                <td>6</td>
                                                <td>PT Est</td>

                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EST_doccument" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EST_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EST_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EST_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="PT_EST_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EST_remarks"  /></td>
                                           </tr>  <tr>
                                                <td>7</td>
                                                <td>PT EE</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EE_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EE_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EE_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EE_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="PT_EE_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="PT_EE_remarks"  /></td>
                                           </tr>  <tr>
                                                <td>8</td>
                                                <td>LWF</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="LWF_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="LWF_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="LWF_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="LWF_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="LWF_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="LWF_remarks"  /></td>
                                           </tr>  <tr>
                                                <td>9</td>
                                                <td>GST No.</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="GST_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="GST_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="GST_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="GST_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="GST_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="GST_remarks"  /></td>
                                           </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Digital Sign</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="Digital_doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="Digital_doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="Digital_doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="Digital_renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="Digital_doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="Digital_remarks"  /></td>
                                           </tr>
                                            <tr>
                                                <td>11</td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="doccument_name" /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="doccument"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="doa"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="doe"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="renewal"  /></td>
                                                <td><input maxlength="100" type="file"  class="form-control" name="doc_upload"  /></td>
                                                <td><input maxlength="100" type="text"  class="form-control" name="remarks"  /></td>
                                           </tr>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
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
    $("<div class=\"row\">\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Name</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"ownerName[]\" placeholder=\"Enter  Name\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Mobile</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\"  name=\"ownerMobile[]\"  placeholder=\"Enter Mobile\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                    </div>\n" +
        "                                    <div class=\"row\">\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Email</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"ownerEmail[]\" placeholder=\"Enter Email\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Pan Number</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"Pan[]\" placeholder=\"Enter Pan Number\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                    </div>\n" +
        "                                    <div class=\"row\">\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Remarks</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"ownerRemarks[]\" placeholder=\"Enter Remarks\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"col-md-6\">\n" +
        "                                            <div class=\"form-group\">\n" +
        "                                                <label class=\"control-label\">Designation</label>\n" +
        "                                                <input maxlength=\"100\" type=\"text\" required=\"required\" class=\"form-control\" name=\"Designation[]\" placeholder=\"Enter Designation\" />\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                    </div>").insertAfter("#appendDiv");
    });

@endsection

