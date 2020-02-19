@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Basic Salary</h3>
                    </div>
                    <form class="form" method="POST" action="{{route('save_company_basic',['id'=>$id])}}">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Basic Salary</label>
                                    @if(count($salaryHead) > 0)
                                    <div class="radio">
                                        @foreach($salaryHead as $s)
                                        <label>
                                            <input type="checkbox" name="salaryHead[]" value="{{$s->id}}" >
                                            {{$s->name}}
                                        </label>
                                        @endforeach
                                    </div>
                                     @else  <div class="alert alert-error" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>You need to add salary Head.</strong>
                                    </div>
                                     @endif

                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-lg-2"></div>--}}
            {{--<div class="col-md-8">--}}
                {{--<!-- general form elements -->--}}
                {{--<div class="box box-primary">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Add deduction</h3>--}}
                    {{--</div>--}}
                    {{--<form class="form" method="POST" action="{{route('save_company_deduction',['id'=>$id])}}">--}}
                        {{--@csrf--}}
                        {{--<div class="box-body">--}}
                            {{--@if (session('error'))--}}
                                {{--<div class="alert alert-error" role="alert">--}}
                                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">×</span>--}}
                                    {{--</button>--}}
                                    {{--<strong>{{ session('error') }}</strong>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                            {{--@if (session('success'))--}}
                                {{--<div class="alert alert-success" role="alert">--}}
                                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">×</span>--}}
                                    {{--</button>--}}
                                    {{--<strong>{{ session('success') }}</strong>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Deduction</label>--}}
                                    {{--@if(count($salaryHead) > 0)--}}
                                    {{--<div class="radio">--}}
                                        {{--@foreach($deduction as $s)--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="deduction[]" value="{{$s->id}}" >--}}
                                            {{--{{$s->Description}}--}}
                                        {{--</label>--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                     {{--@else  <div class="alert alert-error" role="alert">--}}
                                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                                            {{--<span aria-hidden="true">×</span>--}}
                                        {{--</button>--}}
                                        {{--<strong>You need to add salary Head.</strong>--}}
                                    {{--</div>--}}
                                     {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="box-footer">--}}
                            {{--<button type="submit" class="btn btn-primary pull-right">Submit</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2"></div>--}}
        {{--</div>--}}
    </section>

@endsection
@section('script')
@endsection

