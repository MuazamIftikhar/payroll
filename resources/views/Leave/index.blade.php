@extends('layouts.masterLayout')
@section('start')
    Leave & Loan
    <small>Add Leaave</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        {{--<h3 class="box-title">Add Leave</h3>--}}
                    </div>
                    @if(count($leave) > 0)
                        <form class="form" method="POST" action="{{route('save_leave',['id'=>$id])}}" enctype="multipart/form-data">
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

                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>PL</th>
                                        <th>SL</th>
                                        <th>CL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($leave as $l)
                                    <tr>
                                        <td>Opening Balance</td>
                                        <td><input  type ="text" required="required" class="form-control" value="{{$l->OB_PL}}" id="OB_PL" name="OB_PL" ></td>
                                        <td><input  type ="text" required="required" class="form-control" value="{{$l->OB_SL}}" id="OB_SL" name="OB_SL" ></td>
                                        <td><input  type ="text" required="required" class="form-control" value="{{$l->OB_CL}}"  id="OB_CL" name="OB_CL" ></td>
                                    </tr>
                                    @if(count($deduction) > 0)
                                        @foreach($deduction as  $d)
                                            <tr>
                                                <td>Deduction</td>
                                                <td><input  type ="text" required="required" value="{{$d->PL}}" id="D_PL" class="form-control D_PL" name="D_PL" ></td>
                                                <td><input  type ="text" required="required" value="{{$d->SL}}" id="D_SL" class="form-control" name="D_SL" ></td>
                                                <td><input  type ="text" required="required" value="{{$d->CL}}" id="D_CL" class="form-control" name="D_CL" ></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Deduction</td>
                                            <td><input  type ="text" required="required" value="0" id="D_PL" class="form-control D_PL" name="D_PL" ></td>
                                            <td><input  type ="text" required="required" value="0" id="D_SL" class="form-control" name="D_SL" ></td>
                                            <td><input  type ="text" required="required" value="0" id="D_CL" class="form-control" name="D_CL" ></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Closing Balance</td>
                                        <td><input  type ="text" required="required" value="{{$l->CB_PL}}" class="form-control" id="CB_PL" name="CB_PL" ></td>
                                        <td><input  type ="text" required="required" value="{{$l->CB_SL}}" class="form-control" id="CB_SL" name="CB_SL" ></td>
                                        <td><input  type ="text" required="required" value="{{$l->CB_CL}}" class="form-control" id="CB_CL" name="CB_CL" ></td>
                                    </tr>
                                    <tr>
                                        <td>Earning / OP </td>
                                        <td><input  type ="text" required="required" value="0" class="form-control" id="E_PL" name="E_PL" ></td>
                                        <td><input  type ="text" required="required" value="0" class="form-control" id="E_SL" name="E_SL" ></td>
                                        <td><input  type ="text" required="required" value="0" class="form-control" id="E_CL" name="E_CL" ></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    @else

                    <form class="form" method="POST" action="{{route('save_leave',['id'=>$id])}}" enctype="multipart/form-data">
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

                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>PL</th>
                                        <th>SL</th>
                                        <th>CL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Opening Balance</td>
                                            <td><input  type ="text" required="required" class="form-control" value="0" id="OB_PL" name="OB_PL" ></td>
                                            <td><input  type ="text" required="required" class="form-control" value="0" id="OB_SL" name="OB_SL" ></td>
                                            <td><input  type ="text" required="required" class="form-control" value="0"  id="OB_CL" name="OB_CL" ></td>
                                        </tr>
                                        @if(count($deduction) > 0)
                                        @foreach($deduction as  $d)
                                            <tr>
                                                <td>Deduction</td>
                                                <td><input  type ="text" required="required" value="{{$d->PL}}" id="D_PL" class="form-control D_PL" name="D_PL" ></td>
                                                <td><input  type ="text" required="required" value="{{$d->SL}}" id="D_SL" class="form-control" name="D_SL" ></td>
                                                <td><input  type ="text" required="required" value="{{$d->CL}}" id="D_CL" class="form-control" name="D_CL" ></td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td>Deduction</td>
                                                <td><input  type ="text" required="required" value="0" id="D_PL" class="form-control D_PL" name="D_PL" ></td>
                                                <td><input  type ="text" required="required" value="0" id="D_SL" class="form-control" name="D_SL" ></td>
                                                <td><input  type ="text" required="required" value="0" id="D_CL" class="form-control" name="D_CL" ></td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>Closing Balance</td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="CB_PL" name="CB_PL" ></td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="CB_SL" name="CB_SL" ></td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="CB_CL" name="CB_CL" ></td>
                                        </tr>
                                        <tr>
                                            <td>Earning / OP </td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="E_PL" name="E_PL" ></td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="E_SL" name="E_SL" ></td>
                                            <td><input  type ="text" required="required" value="0" class="form-control" id="E_CL" name="E_CL" ></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>
@endsection
@section('script')
    $(document).ready(function() {
    $(document).on('keydown keyup','input',function() {
    var OB_PL=$('#OB_PL').val();
    var OB_SL=$('#OB_SL').val();
    var OB_CL=$('#OB_CL').val();

    var D_PL=$('.D_PL').val();
    var D_SL=$('#D_SL').val();
    var D_CL=$('#D_CL').val();
    console.log("DPL"+D_PL);
    var CB_PL=parseInt(OB_PL) - parseInt(D_PL);
    var CB_SL=parseInt(OB_SL) - parseInt(D_SL);
    var CB_CL=parseInt(OB_CL) - parseInt(D_CL);

    $('#CB_PL').val(CB_PL);
    $('#CB_SL').val(CB_SL);
    $('#CB_CL').val(CB_CL);
    });
    });
@endsection