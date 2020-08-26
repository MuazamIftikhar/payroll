@extends('layouts.masterLayout')
@section('start')
    Leave & Loan
    <small>Manage Loan</small>
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
                    <form class="form" method="GET" action="{{route('searchByCompany_loan')}}">
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
                <h3 class="box-title">Manage Loan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOB</th>
                        <th>DOJ</th>
                        <th>Mobile Number</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $b)
                        <tr>
                            <td>{{$b->Name}}</td>
                            <td>{{$b->fatherName}}</td>
                            <td>{{$b->DOB}}</td>
                            <td>{{$b->DOJ}}</td>
                            <td>{{$b->Phone}}</td>
                            <td>{{$b->City}}</td>
                            <td class="text-center"><a href="{{route('loan',["id" => $b->id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>  </td>
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






