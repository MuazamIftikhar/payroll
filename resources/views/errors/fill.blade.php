@extends('layouts.masterLayout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">

                            <div class="alert alert-error" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ $error }}</strong>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

