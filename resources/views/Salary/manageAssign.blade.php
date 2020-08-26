@extends('layouts.masterLayout')
@section('start')
    Salary Head
    <small>Manage Salary Head</small>
@endsection

@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Salary Head</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Estimation Type</th>
                        <th>Mobile </th>
                        <th>City</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company as $b)
                        <tr>
                            <td>{{$b->companyName}}</td>
                            <td>{{$b->EstType}}</td>
                            <td>{{$b->number}}</td>
                            <td>{{$b->City}}</td>
                            <td>{{$b->District}}</td>
                            <td class="text-center"><a href="{{route('company_basic',["id" => $b->c_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>  </td>
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
