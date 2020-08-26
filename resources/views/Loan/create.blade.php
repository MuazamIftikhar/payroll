@extends('layouts.masterLayout')
@section('start')
    Leave & Loan
    <small>Add Loan</small>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        {{--<h3 class="box-title">Add Loan</h3>--}}
                    </div>
                    @if(count($loan) > 0)
                        <form class="form" method="POST" action="{{route('save_loan',['id'=>$id])}}">
                            @csrf
                            @foreach($loan as $l)
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Date of Loan Issue</label>
                                        <input type="date" class="form-control" value="{{$l->Date}}" name="Date">
                                        @if ($errors->has('Date'))
                                            <span class="danger">{{$errors->first('Date')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Number">Amount</label>
                                        <input type="text" class="form-control" id="Amount" value="{{$l->Amount}}" name="Amount" placeholder="Enter Amount">
                                        @if ($errors->has('Amount'))
                                            <span class="danger">{{$errors->first('Amount')}}</span>
                                        @endif
                                    </div>
                                </div>
                                    @php
                                        $month=date('Y-m');
                                    @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Staff">Deduction from which Month</label>
                                        <input type="month"   min="{{$month}}" class="form-control" value="{{$l->Month}}"  id="Month" name="Month">
                                        @if ($errors->has('Month'))
                                            <span class="danger">{{$errors->first('Month')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Monthly">Monthly installment</label>
                                        <input type="text" class="form-control" value="{{$l->monthlyInstallment}}" id="monthlyInstallment" name="monthlyInstallment" placeholder="Enter Amount">
                                        @if ($errors->has('monthlyInstallment'))
                                            <span class="danger">{{$errors->first('monthlyInstallment')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Number of Installment</label>
                                        <input type="text" class="form-control" value="{{$l->numberInstallment}}" id="numberInstallment" name="numberInstallment" placeholder="Enter Number">
                                        @if ($errors->has('numberInstallment'))
                                            <span class="danger">{{$errors->first('numberInstallment')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Closing Balance</label>
                                        <input type="text" class="form-control" value="{{$l->Balance}}" id="Balance" name="Balance" placeholder="Enter Balance">
                                        @if ($errors->has('Balance'))
                                            <span class="danger">{{$errors->first('Balance')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    @else
                        <form class="form" method="POST" action="{{route('save_loan',['id'=>$id])}}">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Date of Loan Issue</label>
                                        <input type="date" class="form-control" value="{{old('Date')}}" name="Date">
                                        @if ($errors->has('Date'))
                                            <span class="danger">{{$errors->first('Date')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Number">Amount</label>
                                        <input type="text" class="form-control" id="Amount" value="{{old('Amount')}}" id="Amount" name="Amount" placeholder="Enter Amount">
                                        @if ($errors->has('Amount'))
                                            <span class="danger">{{$errors->first('Amount')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Staff">Deduction from which Month</label>
                                        <input type="text" class="form-control" value="{{old('Month')}}" placeholder="Month YYYY"  onfocus="(this.type='month')" id="Month" name="Month" >
                                        @if ($errors->has('Month'))
                                            <span class="danger">{{$errors->first('Month')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Monthly installment</label>
                                        <input type="text" class="form-control" value="{{old('monthlyInstallment')}}" id="monthlyInstallment" name="monthlyInstallment" placeholder="Enter Amount">
                                        @if ($errors->has('monthlyInstallment'))
                                            <span class="danger">{{$errors->first('monthlyInstallment')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Number Of Installment</label>
                                        <input type="text" class="form-control" value="{{old('numberInstallment')}}" id="numberInstallment" name="numberInstallment" placeholder="Enter Number">
                                        @if ($errors->has('numberInstallment'))
                                            <span class="danger">{{$errors->first('numberInstallment')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Hotel">Closing Balance</label>
                                        <input type="text" class="form-control" value="{{old('Balance')}}" id="Balance" name="Balance" placeholder="Enter Balance">
                                        @if ($errors->has('Balance'))
                                            <span class="danger">{{$errors->first('Balance')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </section>

@endsection
@section('script')
    $(document).ready(function() {
    $(document).on('keydown keyup','input',function() {
    var Amount=$('#Amount').val();
    var monthyInstallment=$('#monthlyInstallment').val();
    var prevnumberInstallment=$('#numberInstallment').val();

    var numberInstallment=parseInt(Amount)/parseInt(monthyInstallment);
    $('#numberInstallment').val(numberInstallment);
    $('#Balance').val(Amount);

    });
    });
@endsection