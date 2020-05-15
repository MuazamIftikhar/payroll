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
                    <form class="form" method="GET" action="{{route('form35_excel')}}">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="companyName" name="companyName" class="form-control companyName">
                                        <option>Select</option>
                                        @foreach($company as $c)
                                            <option value="{{$c->id}}">{{$c->companyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="employee_id" name="employee_id" class="form-control ">
                                        <option >Select</option>
                                    </select>
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
    $(document).ready(function() {
    $(".companyName").change(function() {
    var companyName=$('#companyName').val();
    console.log(companyName);
    $.ajax({
    type: "GET",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: "{{route('findEmployee')}}",
    data: {companyName:companyName},
    dataType: "json",
    success: function (data) {
    console.log(data);
    $("#employee_id").empty();
    $.each(data, function(index, element) {
    $("#employee_id").append($('<option>', {
        value: element.id,
        text : element.Name
        }));
        });
        },
        error: function (data) {
        $("#employee_id").empty();
        },
        });
        });
        });
@endsection
