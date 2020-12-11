@extends('layouts.masterLayout')
@section('start')
    Employee
    <small>Import Employee</small>
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Import Employee with Excel</h3>
                    </div>
                    <form class="form" method="POST" action="{{route('printImport')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Company Name <span style="color: red" >*</span></label>
                                    <select class="form-control"  name="companyName">
                                        @foreach($name as $n)
                                            <option value="{{$n->id}}">{{$n->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" class="form-control"  name="select_file">
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
