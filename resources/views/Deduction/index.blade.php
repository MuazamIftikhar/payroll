@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Deduction</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form" method="POST" action="{{route('save_deduction',['id'=>$id])}}">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Description">Enter Description</label>
                                        <input type="text" class="form-control" id="Description" value="PF" name="Description" readonly>
                                        @if ($errors->has('Description'))
                                            <span class="danger">{{$errors->first('Description')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Amount">Enter Amount</label>
                                        <input type="text" class="form-control" id="Amount" value="{{old('Amount')}}" name="Amount" placeholder="Enter Amount">
                                        @if ($errors->has('Amount'))
                                            <span class="danger">{{$errors->first('Amount')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Percentage">Enter Percentage</label>
                                        <input type="text" class="form-control" id="Percentage" value="{{old('Percentage')}}" name="Percentage" placeholder="Enter Percentage">
                                        @if ($errors->has('Percentage'))
                                            <span class="danger">{{$errors->first('Percentage')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="State">Enter State</label>
                                        <select class="form-control" name="State">
                                            <option>No</option>
                                            <option>Gujrat</option>
                                            <option>Maharashtra</option>
                                        </select>
                                        @if ($errors->has('State'))
                                            <span class="danger">{{$errors->first('State')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">PER</label>
                                        <select name="Per" class="form-control">
                                                <option value="Per Day">Per Day</option>
                                                <option value="Per Month">Per Month</option>
                                        </select>
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
    </section>

@endsection
@section('script')
@endsection

