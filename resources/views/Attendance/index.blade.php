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
                            <form class="form" method="POST" action="{{route('save_attendance')}}" enctype="multipart/form-data">
                                @csrf
                                <td>{{$b->Name}}<input type="hidden" required="required" class="form-control" value="{{$b->e_id}}" name="id" /></td>
                                <td><input  type ="text" required="required" value="0" class="PR_Day" id="PR_Day" name="PR_Day" ></td>
                                <td><input  type ="text" required="required" value="0" id="PL" name="PL" ></td>
                                <td><input  type ="text" required="required" value="0" id="SL" name="SL" ></td>
                                <td><input  type ="text" required="required" value="0" id="CL" name="CL" ></td>
                                <td><input  type ="text" required="required" value="0" id="PH" name="PH" ></td>
                                <td><input  type ="text" required="required" id="Total" name="Total"></td>
                                <td><input  type ="text" required="required" name="Advance" ></td>
                                <td><input  type ="text" required="required" name="Loan"></td>
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
     $('#Total').val(total);
     });
    });
@endsection
