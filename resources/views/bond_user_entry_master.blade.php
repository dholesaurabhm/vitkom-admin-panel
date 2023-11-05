@extends('layouts.master')
@section('title') @lang('translation.bond_user_entry') @endsection
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
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Bond</h5> 
                           <ul class="nav nav-tabs mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="Personal Details" role="tab" aria-selected="false" tabindex="-1">
                                                Personal Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="Deal Details" role="tab" aria-selected="true">
                                                Deal Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                                Security Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                Transaction Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                Settelment Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                For Fund/Security Transfer
                                            </a>
                                        </li>
                                    </ul>

                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                        </div>  
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                        <div class="tab-pane active show" id="Personal Details" role="tabpanel">
                                            <h6>Personal Details</h6>

                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>UCC</th>
                                        <th>DP ID</th>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                        <div class="tab-pane active show" id="Deal Details" role="tabpanel">
                                            <h6>Deal Details</h6>
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Deal Date</th>
                                        <th>Order Number</th>
                                        <th>Counter Party</th>
                                        <th>Deal Type</th>
                                        <th>Trade ID</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                        <div class="tab-pane active show" id="Security Details" role="tabpanel">
                                            <h6>Security Details</h6>
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ISIN</th>
                                        <th>Coupon Rate</th>
                                        <th>Security Name</th>
                                        <th>Issuer Name</th>
                                        <th>Face Value</th>
                                        <th>Maturity Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                        <div class="tab-pane active show" id="Transaction Details" role="tabpanel">
                                            <h6>Transaction Details</h6>
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Clean Price</th>
                                        <th>Dirty Price</th>
                                        <th>Stamp Duty</th>
                                        <th>Accrued Interest</th>
                                        <th>Yield Type</th>
                                        <th>Yield Type(%)</th>
                                        <th>Quantity</th>
                                        <th>Total Consideration</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                        <div class="tab-pane active show" id="Settelment Details" role="tabpanel">
                                            <h6>Settelment Details</h6>
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Settlement No.</th>
                                        <th>Settlement Amount(To be paied NES)</th>
                                        <th>Settlement Type</th>
                                        <th>Settlement Date</th>
                                        
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
            <div class="modal-header" id="Personal Details" role="tabpanel">
                <h5 class="modal-title" id="exampleModalgridLabel">Personal Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                              <div class="col-sm-6">
                            <div>
                                <label for="nameInput" class="form-label">Name<span class="red">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Name" required>
                            </div>
                        </div><!--end col-->
                          <div class="col-sm-6">
                            <div>
                                <label for="UCCInput" class="form-label">UCC<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter UCC" required>
                            </div>
                        </div><!--end col-->
                          <div class="col-sm-6">
                            <div>
                                <label for="dpidInput" class="form-label">DP ID<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter DP ID" required>
                            </div>
                        </div><!--end col-->
                    </div>    
                          
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="Deal Details" role="tabpanel">
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                              <div class="col-sm-6">
                            <div>
                                <label for="dealdateInput" class="form-label">Deal Date<span class="red">*</span></label>
                                 <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col-->
                          <div class="col-sm-6">
                            <div>
                                <label for="ordernumberInput" class="form-label">Order Number<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Order Number" >
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="counterpartyInput" class="form-label">Counter Party<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Counter Party" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="dealtypeInput" class="form-label">Deal type<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Counter Party" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="tradeidInput" class="form-label">Trade ID<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Order Number" >
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

@endsection
