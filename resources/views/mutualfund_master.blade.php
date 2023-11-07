@extends('layouts.master')
@section('title') @lang('translation.mutualfund') @endsection
@section('css')

@endsection
@section('content')
<div class="modal fade" id="mutual_fund_modal" tabindex="-1" aria-labelledby="mutual_fundLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lifeinsurance_modalLabel">Mutual Fund</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Holder Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-sm-4">
                            <div>
                                <label for="insurancefirmInput" class="form-label">AMC Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="schemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="folionoInput" class="form-label">Folio No.<span class="red">*</span></label>
                                <input type="text" name="folio_no[]" class="arial dsh_input2" value="" prev_value="">
                    
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="schemenameInput" class="form-label">Plan<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="navInput" class="form-label">NAV<span class="red">*</span></label>
                                <input type="text" name="nav_price[]" class="arial dsh_input2 check_numeric_validation" value="" prev_value="">
                    
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="paymentInput" class="form-label">Purchase Date<span class="red">*</span></label>
                               <input type="date" class="form-control" id="date" placeholder="datepicker-range" required="">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Invested Amount</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Current Units</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Current Value</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Profit/Loss</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Nominee Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Nominee Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
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
<script src="{{ URL::asset('/assets/js/mutualfund_master.js') }}"></script>

@endsection