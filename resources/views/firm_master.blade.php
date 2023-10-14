@extends('layouts.master')
@section('title')
   Firm Master
@endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
    Firm Master
@endslot
@slot('title')
    Firm
@endslot
@endcomponent

    <div class="row">
     
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                
                                  {{-- @if(Auth::user()->role==1)
                                   
                                    @else
                                    <input type="hidden" name="seller_id" id="seller_id" value={{Auth::user()->seller_id}}>
                                    @endif --}}
                            </div>
                         


                            <div class="col-sm-6 text-end">
                                <div>
                                    <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Add Continent</button>
                                    {{-- <a href="{{url('/add_table')}}" class="btn btn-success" ><i
                                            class="ri-add-line align-bottom me-1"></i> Add Category</a> --}}
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <!-- end card header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h5 class="card-title mb-0">Ajax Datatables</h5>
                                    </div> --}}
                                    <div class="card-body">
                                        <table id="" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No</th>
                                                    <th>Short Name</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            {{-- <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Extn.</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



@endsection
@section('script')

@endsection
