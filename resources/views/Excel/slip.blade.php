@extends('layouts.masterLayout')

@section('content')
    <section>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <form class="form" method="GET" action="{{route('Slip_excel')}}">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <select name="id" class="form-control">
                                        @foreach($company as $c)
                                            <option value="{{$c->id}}">{{$c->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="month" class="form-control" id="Month"  name="Month" placeholder="dd-mm-YY">
                                </div>
                            </div>
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<select name="setting" class="form-control">--}}
                                        {{--@foreach($setting as $s)--}}
                                            {{--<option value="{{$s->id}}">Form {{$s->id}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-7">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Search</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection
