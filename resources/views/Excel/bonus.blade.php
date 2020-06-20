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
                    <form class="form" method="GET" action="{{route('Bonus_form_excel')}}">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <select id="companyName" name="company_id" class="form-control companyName">
                                        <option>Select</option>
                                        @foreach($company as $c)
                                            <option value="{{$c->id}}">{{$c->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>From </label>
                                    <input type="month" class="form-control"  name="fromMonth" placeholder="dd-mm-YY">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="month" class="form-control"  name="toMonth" placeholder="dd-mm-YY">
                                </div>
                            </div>

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
