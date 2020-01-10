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
                    @foreach($employee as $b)
                        <tr>
                            <td>{{$b->Name}}</td>
                            <td>{{$b->Email}}</td>
                            <td>{{$b->Phone}}</td>
                            <td>{{$b->companyName}}</td>
                            <td>{{$b->City}}</td>
                            <td class="text-center"><a href="{{route('edit_employee',["id" => $b->id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>  <a href="{{route('delete_employee',["id" => $b->id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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






