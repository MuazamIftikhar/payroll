@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Setting</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
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
                    @foreach($setting as $s)
                    <form class="form" method="POST" action="{{route('save_setting',['id'=>$s->id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Description">Form {{$s->id}}</label>
                                    <textarea type="text" class="form-control"  name="form" required >{{$s->form}}</textarea>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Description">Rules</label>
                                    <textarea type="text" class="form-control"  name="rules" required >{{$s->rules}}</textarea>
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
        </div>
    </section>

@endsection
@section('script')
@endsection

