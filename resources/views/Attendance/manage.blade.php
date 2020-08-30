@extends('layouts.masterLayout')


@section('start')
    Attendance
    <small>Manage Attendance</small>
@endsection
@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Establishment Search</h3>
                    </div>
                    <form class="form" method="GET" action="{{route('searchByCompany_manageAttendance')}}">
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
                                <input type="month" class="form-control" id="Month"  name="Month" value="{{$monthShow}}" >
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
                <h3 class="box-title">Manage Attendance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOJ</th>
                        <th>Month</th>
                        <th>Assign Day</th>
                        <th>PR Day</th>
                        <th>PL</th>
                        <th>SL</th>
                        <th>CL</th>
                        <th>PH</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendance as $b)
                        <tr>
                            <td>{{$b->Name}}</td>
                            <td>{{$b->fatherName}}</td>
                            <td>{{$b->DOJ}}</td>
                            <td>{{$monthShow}}</td>
                            <td>{{$b->assignDay}}</td>
                            <td>{{$b->PR_Day}}</td>
                            <td>{{$b->PL}}</td>
                            <td>{{$b->SL}}</td>
                            <td>{{$b->CL}}</td>
                            <td>{{$b->PH}}</td>
                            <td>{{$b->Total}}</td>
                            <td class="text-center"><a href="{{route('edit_attendance',["id" => $b->a_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>  <a href="{{route('delete_attendance',["id" => $b->a_id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </section>

@endsection
@section('script')



@endsection






