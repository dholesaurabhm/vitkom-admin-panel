@extends('layouts.master')
@section('title') @lang('translation.report1') @endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card card-animate">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
</div>

@endsection
@section('script')
<!-- apexcharts -->


<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

@endsection