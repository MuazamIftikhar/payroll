@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Salary Head</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form" method="POST" action="{{route('save_company_deduction')}}">
                        @csrf
                        <div class="box-body">
                            @if (session('error'))
                                <div class="alert alert-error" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Name">Enter Deduction</label>
                                        <input type="text" class="form-control" required id="Name" value="{{old('Name')}}" name="Name" placeholder="Enter Name">
                                        @if ($errors->has('Name'))
                                            <span class="danger">{{$errors->first('Name')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Salary Head</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company as $s)
                                <tr>
                                    <td>{{$s->name}}</td>
                                    <td class="text-center"><a href="{{route('edit_company_deduction',["id" => $s->id ])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </section>

@endsection
@section('script')
@endsection

