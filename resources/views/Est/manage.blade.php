@extends('layouts.masterLayout')
@section('start')
    Account
    <small>Manage Establishmnet</small>
@endsection
@section('content')
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage Establishment</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Establishmnet Name</th>
                        <th>Type</th>
                        <th>Establishmnet Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estimation as $b)
                        <tr>
                            <td>{{$b->ownerName}}</td>
                            <td>{{$b->EstType}}</td>
                            <td>{{$b->Factory}}</td>
                            <td>{{$b->City}}</td>
                            <td class="text-center"> <a href="{{route('delete_est',["id" => $b->e_id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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






