@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Deduction</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @foreach($salaryHead as $s)
                        <form class="form" method="POST" action="{{route('update_company_deduction',["id" => $s->id ])}}">
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
                                            <label for="Name">Deduction</label>
                                            <input type="text" class="form-control" required id="Name" value="{{$s->name}}" name="Name">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection

