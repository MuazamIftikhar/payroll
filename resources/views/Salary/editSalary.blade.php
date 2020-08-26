@extends('layouts.masterLayout')
@section('start')
    Salary
    <small>Manage Salary</small>
@endsection
@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        @foreach($salaryHead as $s)
                            <th>{{$s->name}}</th>
                        @endforeach
                        <th>strategy</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $b)
                        <tr>
                        <form class="form" method="POST" action="{{route('update_salary')}}" enctype="multipart/form-data">
                            @csrf
                        <td>{{$b->Name}}<input type="hidden" required="required" class="form-control" name="id" value="{{$b->e_id}}"><input type="hidden" required="required" class="form-control" name="employee_id" value="{{$b->employee_id}}"></td>
                        <td>{{$b->fatherName}}<input type="hidden" class="form-control" value="{{$b->c_id}}" name="Name"/></td>
                        @foreach($salaryHead as $s)
                            <td><input maxlength="100" type="text" required="required"class="form-control" style="width: 100%" name="{{$s->id}}"/></td>
                        @endforeach
                        <td><select  class="form-control" name="salaryFlag" >
                                <option {{$b->salary_flag=="Per Day" ? "selected" : ""}}>Per Day</option>
                                <option {{$b->salary_flag=="Per Month" ? "selected" : ""}}>Per Month</option>
                            </select></td>
                            <td class="text-center"><button class="btn btn-success " type="submit">Edit</button></td>
                        </form>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection
