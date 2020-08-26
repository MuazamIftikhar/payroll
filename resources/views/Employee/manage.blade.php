@extends('layouts.masterLayout')
@section('start')
    Account
    <small>Manage Employee</small>
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
                    <form class="form" method="GET" action="{{route('searchByCompany')}}">
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
                <h3 class="box-title">Manage Employer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Mobile Number</th>
                        <th>DOJ</th>
                        <th>DOB</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $b)
                        <tr>
                            <td>{{$b->Name}}</td>
                            <td>{{$b->fatherName}}</td>
                            <td>{{$b->Phone}}</td>
                            <td>{{$b->DOJ}}</td>
                            <td>{{$b->DOB}}</td>
                            <td>{{$b->per_City}}</td>
                            <td class="text-center"><a href="{{route('edit_employee',["id" => $b->id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> @role('Staff Admin') <a href="{{route('delete_employee',["id" => $b->id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> @endrole @role('Super Admin') <a href="{{route('delete_employee',["id" => $b->id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> @endrole</td>
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






