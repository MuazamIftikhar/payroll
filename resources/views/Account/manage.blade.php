@extends('layouts.masterLayout')

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
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $b)
                        <tr>
                            <td>{{$b->user_name}}</td>
                            <td>{{$b->email}}</td>
                            <td>{{$b->number}}</td>
                            <td>{{$b->role_name}}</td>
                            <td class="text-center"><a href="{{route('edit_user',["id" => $b->user_col_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> @if($b->user_col_id > 1)<a href="{{route('delete_user',["id" => $b->user_col_id ])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>@endif</td>
    {{--                            <a href="{{route('edit_user',["id" => $b->user_col_id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>--}}
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






