@extends('layouts.master')
@section('title') @lang('translation.medical') @endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Medical Insurance</h5> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                        </div>  
                        <div class="card-body">
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Insured Person Name</th>
                                        <th>Insurance Firm</th>
                                        <th>Scheme Name</th>
                                        <th>Polycy NO</th>
                                        <th>Primum Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
</div>

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Medical Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div>
                                <label for="nameInput" class="form-label">Insured Person Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="insurancefirmInput" class="form-label">Insurance Firm<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="SchemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div>    
                        <div class="col-sm-6">
                            <div>
                                <label for="schemeInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <input type="name" class="form-control scheme_name" id="scheme_name" placeholder="Enter Scheme Name" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="policynoInput" class="form-label">Policy No<span class="red">*</span></label>
                                <input type="number" class="form-control policy_number" id="policy_number" placeholder="Enter Pollicy Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="startdateInput" class="form-label">Start Date<span class="red">*</span></label>
                               <input type="date" class="form-control start_date" id="start_date" placeholder="datepicker-range" required>

                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a Date<span class="red">*</span></label>
                                <input type="date" class="form-control pick_a_date" id="pick_a_date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="maturitydateInput" class="form-label">Maturity Date<span class="red">*</span></label>
                                <input type="date" class="form-control Maturity_date" id="Maturity_date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a date<span class="red">*</span></label>
                                <input type="date" class="form-control pick_a_date" id="pick_a_date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="sumassuredInput" class="form-label">Sum Assured<span class="red">*</span></label>
                                <input type="number" class="form-control sum_assured" id="sum_assured" placeholder="Enter Number" >
                            </div>
                        </div><!--end col--> 
                        
                         
                        <div class="col-sm-6">
                            <div>
                                <label for="primumamountInput" class="form-label">Premium Amount<span class="red">*</span></label>
                                <input type="number" class="form-control premium_amount" id="premium_amount" placeholder="Enter Number" >
                            </div>
                        </div><!--end col-->
                        
                       
             
                       
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<!-- apexcharts -->

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/medical_master.js') }}"></script>

@endsection
