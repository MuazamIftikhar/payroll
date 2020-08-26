@extends('layouts.masterLayout')
@section('style')
    input{
    width:60%;
    }
    th,td{
    text-align:center;
    }
    @endsection
@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <form class="form" method="GET" action="{{route('searchByCompany_attendance')}}">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="Name" class="form-control">
                                        @foreach($company as $c)
                                            <option value="{{$c->id}}">{{$c->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="Month"  name="Month" type="text" placeholder="Month YYYY"  onfocus="(this.type='month')" >
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Assign Day</th>
                            <th>Pr Day</th>
                            <th>PL</th>
                            <th>SL</th>
                            <th>CL</th>
                            <th>PH</th>
                            <th>Total</th>
                            <th>Advance</th>
                            <th>Loan Inst</th>
                            <th>Other Deduction</th>
                            <th>OT Hrs</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee as $b)
                        <tr>
                            <form class="form" method="POST" action="{{route('save_attendance',["month"=>$month])}}" enctype="multipart/form-data">
                                @csrf
                                <td>{{$b->Name}}<input type="hidden" required="required" class="form-control" value="{{$b->e_id}}" name="id" /></td>
                                <td><input  type ="text" required="required" value="0" name="assignDay" ></td>
                                <td><input  type ="text" required="required" value="0" class="PR_Day" id="PR_Day" name="PR_Day" ></td>
                                <td><input  type ="text" required="required" value="{{$b->OB_PL == "" ? "0" : "$b->OB_PL"}}" id="PL" name="PL" ></td>
                                <td><input  type ="text" required="required" value="{{$b->OB_SL == "" ? "0" : "$b->OB_SL"}}" id="SL" name="SL" ></td>
                                <td><input  type ="text" required="required" value="{{$b->OB_CL == "" ? "0" : "$b->OB_CL"}}" id="CL" name="CL" ></td>
                                <td><input  type ="text" required="required" value="0" id="PH" name="PH" ></td>
                                <td><input  type ="text" required="required" id="Total" name="Total"></td>
                                <td><input  type ="text" required="required" name="Advance" ></td>
                                @php
                                    $checkLoan=App\Http\Controllers\AttendanceController::CheckLoan($b->e_id);
                                @endphp
                                <td><input  type ="text" required="required" value="{{$checkLoan == null ? "0" : ($checkLoan->Balance < $checkLoan->monthlyInstallment ? $checkLoan->Balance : $checkLoan->monthlyInstallment)}}" name="Loan"></td>
                                <td><input  type ="text" required="required" name="Deduction"></td>
                                <td><input  type ="text" required="required" name="OT" ></td>
                                <td class="text-center"><button class="btn btn-success " type="submit">Add</button></td>
                            </form>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>

@endsection
@section('script')
    $(document).ready(function() {
    $(document).on('keydown keyup','input',function() {
     var PR_Day=$(this).closest('tr').find('#PR_Day').val();
     var PL=$(this).closest('tr').find('#PL').val();
     var SL=$(this).closest('tr').find('#SL').val();
     var CL=$(this).closest('tr').find('#CL').val();
     var PH=$(this).closest('tr').find('#PH').val();
     var total=parseInt(PR_Day)+parseInt(PL)+parseInt(SL)+parseInt(CL)+parseInt(PH);
     $(this).closest('tr').find('#Total').val(total);
     });
    });
@endsection
