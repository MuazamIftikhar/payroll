@extends('layouts.masterLayout')

@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Company Name</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company as $b)
                        <tr>
                            <td>{{$b->companyName}}</td>
                            <td>{{$b->Pin}}</td>
                            <td>{{$b->City}}</td>
                            <td>{{$b->State}}</td>
                            <td>{{$b->EstType}}</td>
                            <td class="text-center"><a href="{{route('deduction',["id" => $b->user_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>  </td>
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




