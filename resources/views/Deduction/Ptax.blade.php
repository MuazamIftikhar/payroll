@extends('layouts.masterLayout')
@section('start')
    Deduction
    <small>PT Deduction</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">PT Deduction</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form" method="POST" action="{{route('save_ptax')}}">
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

                                @foreach($ptax as $d)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">IF Cash Total = 0</label>
                                        <input type="text" class="form-control" value="{{$d->value1}}" name="value1" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">IF Cash Total < 6000</label>
                                        <input type="text" class="form-control" value="{{$d->value2}}" name="value2" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">IF Cash Total < 9000</label>
                                        <input type="text" class="form-control" value="{{$d->value3}}" name="value3" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">IF Cash Total < 12000</label>
                                        <input type="text" class="form-control" value="{{$d->value4}}" name="value4" required >
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">IF Cash Total > 12000</label>
                                        <input type="text" class="form-control" value="{{$d->value5}}" name="value5" required >
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection

