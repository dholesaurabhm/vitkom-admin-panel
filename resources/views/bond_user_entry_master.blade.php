@extends('layouts.master')
@section('title') @lang('translation.bond_user_entry') @endsection
@section('css')

@endsection
@section('content')
  
                       <div class="modal fade" id="bonds_modal" tabindex="-1" aria-labelledby="bonds_modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lifeinsurance_modalLabel">Bond</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#personal" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-home-5-line align-middle me-1"></i> Personal
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#deal" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-user-line me-1 align-middle"></i> Deal
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#security" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-question-answer-line align-middle me-1"></i>Security
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#transaction" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-question-answer-line align-middle me-1"></i>Transaction
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#settelment" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-question-answer-line align-middle me-1"></i>Settlement
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#fundtrasfer" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-question-answer-line align-middle me-1"></i>Funds Transfer
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#bondtransfer" role="tab" aria-selected="true">
                                <i class="ri-question-answer-line align-middle me-1"></i>Bond Transfer
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                       <div class="tab-pane" id="personal" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Name<span class="red">*</span></label>
                                        <input type="text" class="form-control name" id="name" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">UCC<span class="red">*</span></label>
                                        <input type="text" class="form-control ucc" id="ucc" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">DP ID<span class="red">*</span></label>
                                        <input type="text" class="form-control dp_id" id="dp_id" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="tab-pane" id="deal" role="tabpanel">
                            <div class="row g-3">
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Deal Date<span class="red">*</span></label>
                                        <input type="date" class="form-control deal_date" id="deal_date" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Order Number<span class="red">*</span></label>
                                        <input type="number" class="form-control order_number" id="order_number" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Counterparty<span class="red">*</span></label>
                                        <input type="text" class="form-control Counterparty" id="Counterparty" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Deal Type<span class="red">*</span></label>
                                        <input type="text" class="form-control deal_type" id="deal_type" required="">
                                    </div>
                                </div>
                                    
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Trade ID<span class="red">*</span></label>
                                        <input type="number" class="form-control trade_id" id="trade_id" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="security" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">ISIN<span class="red">*</span></label>
                                        <input type="text" class="form-control isin" id="isin" required="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Coupon Rate<span class="red">*</span></label>
                                        <input type="number" class="form-control coupen_rate" id="coupen_rate" required="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Security Name<span class="red">*</span></label>
                                        <input type="text" class="form-control security_name" id="security_name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Issuer Name<span class="red">*</span></label>
                                        <input type="text" class="form-control issuer_name" id="issuer_name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Face Value<span class="red">*</span></label>
                                        <input type="number" class="form-control face_value" id="face_value" required="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div>
                                        <label for="nameInput" class="form-label">Maturity Date<span class="red">*</span></label>
                                        <input type="date" class="form-control maturity_date" id="maturity_date" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                                </div>
                        </div>

                        <div class="tab-pane" id="transaction" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Clean Price<span class="red">*</span></label>
                                        <input type="number" class="form-control clean_price" id="clean_price" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Dirty Price<span class="red">*</span></label>
                                        <input type="number" class="form-control dirty_price" id="dirty_price" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Stamp Duty<span class="red">*</span></label>
                                        <input type="text" class="form-control stamp_duty" id="stamp_duty" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Accrued Interest<span class="red">*</span></label>
                                        <input type="text" class="form-control accured_interest" id="accured_interest" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Yield Type<span class="red">*</span></label>
                                        <input type="text" class="form-control yield_type" id="yield_type" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Yield (%)<span class="red">*</span></label>
                                        <input type="number" class="form-control yield_(%)" id="yield_(%)" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Quantity<span class="red">*</span></label>
                                        <input type="number" class="form-control quantity" id="quantity" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Total Consideratio n<span class="red">*</span></label>
                                        <input type="text" class="form-control total_consideratio_n" id="total_consideratio_n" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="tab-pane" id="settelment" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement No.<span class="red">*</span></label>
                                        <input type="number" class="form-control settlement_no" id="settlement_no" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Amount (paid to NSE)<span class="red">*</span></label>
                                        <input type="number" class="form-control settlement_amount" id="settlement_amount" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Type<span class="red">*</span></label>
                                        <input type="number" class="form-control settlement_type" id="settlement_type" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Date<span class="red">*</span></label>
                                        <input type="date" class="form-control settlement_date" id="settlement_date" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="fundtrasfer" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Bank Name<span class="red">*</span></label>
                                        <input type="text" class="form-control bank_name" id="bank_name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Beneficiary Name<span class="red">*</span></label>
                                        <input type="text" class="form-control beneficiary_name" id="beneficiary_name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Bank IFSC Code.<span class="red">*</span></label>
                                        <input type="text" class="form-control" id="date" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Bank Account no<span class="red">*</span></label>
                                        <input type="text" class="form-control" id="date" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active show" id="bondtransfer" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Market Type<span class="red">*</span></label>
                                        <input type="text" class="form-control" id="date" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">CM Name<span class="red">*</span></label>
                                        <input type="text" class="form-control cm_name" id="cm_name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">CM-BP ID<span class="red">*</span></label>
                                        <input type="text" class="form-control" id="date" required="">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement No<span class="red">*</span></label>
                                        <input type="number" class="form-control" id="date" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
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
<script src="{{ URL::asset('/assets/js/bond_user_entry_master.js') }}"></script>



@endsection