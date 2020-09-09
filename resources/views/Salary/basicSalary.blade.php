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
                        <h3 class="box-title">Search</h3>
                    </div>
                    <form class="form" method="GET" action="{{route('searchByCompany_salary')}}">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="input-group input-group-lg">
                                <select name="Name" class="form-control">
                                    @foreach($company as $c)
                                        <option value="{{$c->id}}">{{$c->companyName}}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                  <button type="submit"  class="btn btn-primary pull-right"><i class="fa fa-search"> Search</i> </button>
                                </span>
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
                    <tbody>
                    @foreach($employee as $b)
                        <tr>
                            <form class="form" method="POST" action="{{route('save_salary')}}" enctype="multipart/form-data">
                                @csrf
                            <td>{{$b->Name}}<input type="hidden" required="required" class="form-control" value="{{$b->e_id}}" name="id" /><input type="hidden" class="form-control" value="{{$b->company_id}}" name="Name"/></td>
                            <td>{{$b->fatherName}}</td>
                            <td>{{$b->DOJ}}</td>
                            <td>{{$b->DOB}}</td>
                            @foreach($salaryHead as $s)
                            <td><input maxlength="100" type="text" required="required" class="form-control" style="width: 100%" name="{{$s->id}}"/></td>
                            @endforeach
                            <td><select  class="form-control" name="salaryFlag" >
                                    <option>Per Day</option>
                                    <option>Per Month</option>
                                </select></td>
                            <td class="text-center"><button class="btn btn-success " type="submit">Add</button></td>
                            </form>
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
