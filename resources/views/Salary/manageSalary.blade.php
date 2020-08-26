@extends('layouts.masterLayout')
@section('start')
    Salary
    <small>Manage Salary</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Establishmnet Search</h3>
                    </div>
                    <form class="form" method="GET" action="{{route('searchByCompany_manageSalary')}}">
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
                <h3 class="box-title">Manage Salaries</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOJ</th>
                        <th>DOB</th>
                        @foreach($salaryHead as $s)
                            <th>{{$s->name}}</th>
                        @endforeach
                        <th>strategy</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @php
                    $countSalaryHead=count($salaryHead);
                    @endphp
                    <tbody>
                    @foreach($employee as $b)
                        @php
                            $countSalaryHeads=json_decode($b->salary_head,true);
                            $counts=count($countSalaryHeads);
                        @endphp
                        <tr>
                        <td>{{$b->Name}}</td>
                        <td>{{$b->fatherName}}</td>
                        <td>{{$b->DOJ}}</td>
                        <td>{{$b->DOB}}</td>
                        @foreach(json_decode($b->salary_head) as $s)
                            <td><input maxlength="100" type="text" required="required"class="form-control" value="{{$s}}" disabled name="basicSalary[]"/></td>
                        @endforeach
                            @if($countSalaryHead == $counts)
                            @else
                                <td><input maxlength="100" type="text" required="required"class="form-control" value="0" disabled name="basicSalary[]"/></td>
                            @endif
                        <td><input maxlength="100" type="text" required="required" disabled class="form-control" value="{{$b->salary_flag}}" name="basicSalary[]" /></td>
                        <td class="text-center"><a href="{{route('edit_salary',["id" => $b->id,"Name"=>$b->company_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>
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
