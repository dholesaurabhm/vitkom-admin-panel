
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.user_dashboard'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card"> 

                        <div class="card-header" style="padding: 10px;">
                            <button type="button" class="btn btn-primary waves-effect waves-light mutual_fund_btn"    data-bs-toggle="modal" data-bs-target="#mutual_fund_modal" style="display:none;float: right;">Add New Mutual Fund</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light bonds_btn" data-bs-toggle="modal" data-bs-target="#bonds_modal" style="display:none;float: right;">Add New Bonds</button> 
                            <button type="button" class="btn btn-primary waves-effect waves-light life_insurance_btn"  data-bs-toggle="modal" data-bs-target="#lifeinsurance_modal" style="display:none;float: right;">Add New Life Insurance</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light medical_insurance_btn" data-bs-toggle="modal" data-bs-target="#medical_insurance_modal" style="display:none;float: right;">Add New Medical Insurance</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light general_insurance_btn" data-bs-toggle="modal" data-bs-target="#general_insurance_modal" style="display:none;float: right;">Add New General Insurance</button>
                        </div> 
                        <div class="card-body">
                             <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#mutual_fund" role="tab" onclick="show_only_mutual_fund()">
                                               Mutual Fund
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#bonds" role="tab" onclick="show_only_bond()">
                                                Bonds
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#lifeinsurance" role="tab" onclick="show_only_life_insurance()">
                                                Life Insurance
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#medicalinsurance" role="tab" onclick="show_only_mediacal_insurance()">
                                                Medical Insurance
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#generalinsurance" role="tab" onclick="show_only_general_insurance()">
                                                General Insurance
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="mutual_fund" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="mf-datatables" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Scheme Name</th>
					                                        <th>Plan</th>
					                                        <th>SIP Mode</th>
					                                        <th>Start Date</th>
					                                        <th>End Date</th>
					                                        <th>Curr NAV</th>
					                                        <th>Buy Value</th>
					                                        <th>Curr Value</th>
					                                        <th>Profit/Loss</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="bonds" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="bonds-datatables" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Name</th>
					                                        <th>Security Name</th>
					                                        <th>Issuer Name</th>
					                                        <th>Deal Date</th>
					                                        <th>Clean Price</th>
					                                        <th>Yield (%)</th>
					                                        <th>Quantity</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="lifeinsurance" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="life-datatables" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Insured Person Name</th>
					                                        <th>Type</th>
					                                        <th>Policy No.</th>
					                                        <th>Insurance Firm</th>
					                                        <th>Scheme Name</th>
					                                        <th>Start Date</th>
					                                        <th>Maturity Date</th>
					                                        <th>Premium Amount</th>
					                                        <th>Current Value</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="medicalinsurance" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="medical-datatables" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Insured Person Name</th>
					                                        <th>Type</th>
					                                        <th>Policy No.</th>
					                                        <th>Insurance Firm</th>
					                                        <th>Scheme Name</th>
					                                        <th>Start Date</th>
					                                        <th>Maturity Date</th>
					                                        <th>Premium Amount</th>
					                                        <th>Sum Assured</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="generalinsurance" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="general-datatables" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Insured Person Name</th>
					                                        <th>Type</th>
					                                        <th>Policy No.</th>
					                                        <th>Insurance Firm</th>
					                                        <th>Scheme Name</th>
					                                        <th>Start Date</th>
					                                        <th>Maturity Date</th>
					                                        <th>Premium Amount</th>
					                                        <th>Sum Assured</th>
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
        </div>
    </div> 
</div>

<!--mutual_fund_modal-->
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
                                <label for="schemenameInput" class="form-label">Folio No.<span class="red">*</span></label>
                               <input type="text" class="form-control" id="date" required>
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
                                <label for="schemenameInput" class="form-label">NAV<span class="red">*</span></label>
                               <input type="text" class="form-control" id="date" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="paymentInput" class="form-label">Purchase Date<span class="red">*</span></label>
                               <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Invested Amount</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Current Units</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Current Value</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Profit/Loss</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Nominee Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Nominee Name" >
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
<!--mutual_fund_modal-->

<!--bonds_modal-->
<div class="modal fade" id="bonds_modal" tabindex="-1" aria-labelledby="bonds_modalLabel" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lifeinsurance_modalLabel">Bond</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
     				<ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal" role="tab" aria-selected="false">
                                <i class="ri-home-5-line align-middle me-1"></i> Personal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#deal" role="tab" aria-selected="false">
                                <i class="ri-user-line me-1 align-middle"></i> Deal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#security" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Security
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#transaction" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settelment" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Settlement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#fundtrasfer" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Funds Transfer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#bondtransfer" role="tab" aria-selected="false">
                                <i class="ri-question-answer-line align-middle me-1"></i>Bond Transfer
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
		               <div class="tab-pane active" id="personal" role="tabpanel">
		                    <div class="row g-3">
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Name<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">UCC<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">DP ID<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
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
										<input type="date" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Order Number<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Counterparty<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Deal Type<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>
									
		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Trade ID<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
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
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>

		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Coupon Rate<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
		                            </div>
		                        </div>

		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Security Name<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>

		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Issuer Name<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
		                            </div>
		                        </div>

		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Face Value<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
		                            </div>
		                        </div>

		                        <div class="col-sm-4">
		                            <div>
		                                <label for="nameInput" class="form-label">Maturity Date<span class="red">*</span></label>
										<input type="date" class="form-control" id="date" required>
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
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Dirty Price<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Stamp Duty<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Accrued Interest<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Yield Type<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Yield (%)<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Quantity<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Total Consideratio n<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
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
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Amount (paid to NSE)<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Type<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement Date<span class="red">*</span></label>
										<input type="date" class="form-control" id="date" required>
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
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Beneficiary Name<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Bank IFSC Code.<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Bank Account no<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
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
                        <div class="tab-pane" id="bondtransfer" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Market Type<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">CM Name<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">CM-BP ID<span class="red">*</span></label>
										<input type="text" class="form-control" id="date" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div>
                                        <label for="nameInput" class="form-label">Settlement No<span class="red">*</span></label>
										<input type="number" class="form-control" id="date" required>
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
<!--bonds_modal-->

<!--lifeinsurance_modal-->
<div class="modal fade" id="lifeinsurance_modal" tabindex="-1" aria-labelledby="lifeinsurance_modalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lifeinsurance_modalLabel">Life Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria        -label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Insured Person Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div>
                                <label for="insurancefirmInput" class="form-label">Insurance Firm<span class="red">*</span></label>
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
                                <label for="policynoInput" class="form-label">Policy No<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Pollicy Number" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="paymentInput" class="form-label">Payment Start Date<span class="red">*</span></label>
                               <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="paymentInput" class="form-label">Payment End Date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="close-date-Input" class="form-label">Maturity Date</label>
                                <input type="date" class="form-control" id="date" placeholder="date" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Sum Assured</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="primumInput" class="form-label">Primum</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="dateofBirth" class="form-label">Mode</label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="currentvalueInput" class="form-label">Current Value</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="maturityamountInput" class="form-label">Maturity Amount</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Nominee Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Nominee Name" >
                            </div>
                        </div>
                       
             
                       
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--lifeinsurance_modal-->


<!--medical_insurance_modal-->
<div class="modal fade" id="medical_insurance_modal" tabindex="-1" aria-labelledby="medical_insuranceLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medical_insuranceLabel">Medical Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria        -label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Insured Person Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-sm-4">
                            <div>
                                <label for="insurancefirmInput" class="form-label">Insurance Firm<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="SchemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div>    
                        <div class="col-sm-4">
                            <div>
                                <label for="schemeInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Scheme Name" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="policynoInput" class="form-label">Policy No<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Pollicy Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="startdateInput" class="form-label">Start Date<span class="red">*</span></label>
                               <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>

                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a Date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="maturitydateInput" class="form-label">Maturity Date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Sum Assured</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div><!--end col--> 
                        
                         
                        <div class="col-sm-4">
                            <div>
                                <label for="primumamountInput" class="form-label">Premium Amount</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
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
<!--medical_insurance_modal-->


<!----general_insurance_modal---->
<div class="modal fade" id="general_insurance_modal" tabindex="-1" aria-labelledby="general_insuranceLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="general_insuranceLabel">General Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div>
                                <label for="nameInput" class="form-label">Insured Person Name<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                          <div class="col-sm-4">
                            <div>
                                <label for="typeinput" class="form-label">Type<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="insurancefirmInput" class="form-label">Insurance Firm<span class="red">*</span></label>
                                <select class="form-select mb-2" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col-->
                       
                        <div class="col-sm-4">
                            <div>
                                <label for="schemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Scheme Name" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="policynoInput" class="form-label">Policy No<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Pollicy Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="startdateInput" class="form-label">Start Date<span class="red">*</span></label>
                               <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>

                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a Date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="enddateInput" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="pickadateInput" class="form-label">Pick a date</label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-4">
                            <div>
                                <label for="sumassuredInput" class="form-label">Sum Assured</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
                            </div>
                        </div><!--end col--> 
                        
                         
                        <div class="col-sm-4">
                            <div>
                                <label for="primumamountInput" class="form-label">Premium Amount</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Number" >
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
<!----general_insurance_modal---->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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

<!-- <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script> -->
<script src="<?php echo e(URL::asset('/assets/js/user_dashboard.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/user_dashboard.blade.php ENDPATH**/ ?>