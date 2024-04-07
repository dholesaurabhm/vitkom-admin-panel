

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.user_dashboard'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<style type="text/css">

#bond_table_wrapper {
    width: 100% !important;
}
div.dataTables_wrapper {
    position: relative;
    width: 100%;
}


#life_table_wrapper, #health_table_wrapper {
    width: 100% !important;
}



#medical-datatables_wrapper {
    width: 100% !important;
}



#general-datatables_wrapper {
    width: 100% !important;
}

.table-responsive.mt-4 {
    height: 300px;
}

table#mutual_fund_table td:nth-child(3),
table#mutual_fund_table td:nth-child(4),
table#mutual_fund_table td:nth-child(5),
table#mutual_fund_table td:nth-child(6) {
    text-align: right !important;
}



table#mutual_report td:nth-child(2),
table#mutual_report td:nth-child(3),
table#mutual_report td:nth-child(4),
table#mutual_report td:nth-child(5),
table#mutual_report td:nth-child(6) {
    text-align: right !important;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col">



        <div class="h-100">

            <div class="row">

                <div class="col-xl-12 col-md-12">

                    <div class="card"> 




                           


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
                                        
                                    </ul>



                                    <!-- Tab panes -->

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="mutual_fund" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="mutual_fund_table" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Scheme Name</th>
					                                        <th>Plan</th>
					                                        <th>NAV</th>
					                                        <th>Invested Amount</th>
					                                        <th>Current Unit</th>
					                                        <th>Current Value</th>
					                                        <th>Profit/Loss</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="3">Total</th>
                                                            <th>0</th>
                                                            <th>0</th>
                                                            <th>0</th>
                                                            <th>0</th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
					                            </table>
                                            </div>
                                        </div>



                                        <div class="tab-pane" id="bonds" role="tabpanel">
                                            <div class="d-flex">
					                            <table  id="bond_table" class="display table table-bordered dt-responsive" 
                                                        style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Bond Name</th>
                                                            <th>Purchase Value</th>
					                                        <th>Start Date</th>
                                                            <th>Client</th>
					                                        <th>Platform</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="lifeinsurance" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="life_table" class="display table table-bordered dt-responsive" style="width:100% !important">
					                                <thead>
					                                    <tr>
					                                        <th>Insured Person Name</th>
					                                        <th>Type</th>
					                                        <th>Policy No.</th>
					                                        <th>Insurance Firm</th>
					                                        <th>Scheme Name</th>
                                                            <th>Mode Payment</th>
					                                        <th>Start Date</th>
					                                        <th>Maturity Date</th>
					                                        <th>Premium Amount</th>
					                                        <th>Status</th>
					                                        <th>Action</th>
					                                    </tr>
					                                </thead>
					                            </table>
                                            </div>
                                        </div>



                                        <div class="tab-pane" id="medicalinsurance" role="tabpanel">
                                            <div class="d-flex">
					                            <table id="health_table" class="display table table-bordered dt-responsive" style="width:100% !important">
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

                <form id="mutualfund_form">

                    <div class="row g-3">

                        <input type="hidden" name="client_id" id="client_id" value="<?php echo e($id); ?>">

                        <input type="hidden" name="mutual_id" id="mutual_id" value="">

                        

                        <div class="col-sm-4">

                            <div>

                                <label for="insurancefirmInput" class="form-label">AMC Name<span class="red">*</span></label>

                                <select class="form-select mb-2 amc_list" aria-label="Default select example" name="amc_id" id="amc_id">

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="schemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>

                                <select class="form-select mb-2 amcplan_list" aria-label="Default select example" name="scheme_id" id="scheme_id">

                                    <option value="">Please Scheme Name</option>

                                </select>

                            </div>

                        </div>

                        <input type="hidden" name="scheme_name" id="scheme_name" value="">

                        <input type="hidden" name="isin" id="isin" value="">

                        <div class="col-sm-4">

                            <div>

                                <label for="schemenameInput" class="form-label">Folio No.<span class="red">*</span></label>

                               <input type="text" class="form-control" name="folio_no" id="folio_no" placeholder="Enter Folio No" required>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="schemenameInput" class="form-label">Plan<span class="red">*</span></label>

                                <select class="form-select mb-2" aria-label="Default select example" name="plan" id="plan">

                                    <option value="">Select Plan</option>

                                   <option value="SIP">SIP</option>

                                   <option value="SWP">SWP</option>

                                </select>

                            </div>

                        </div>

                        

                        <div class="col-sm-4">

                            <div>

                                <label for="schemenameInput" class="form-label">Current NAV<span class="red">*</span></label>

                               <input type="text" class="form-control" id="nav" name="nav" placeholder="Enter nav" readonly>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="sumassuredInput" class="form-label">Current Units</label>

                                <input type="number" class="form-control" id="current_unit" name="current_unit" placeholder="Enter Number" readonly>

                            </div>

                        </div>

                      

                        <div class="col-sm-4">

                            <div>

                                <label for="sumassuredInput" class="form-label">Invested Amount</label>

                                <input type="number" class="form-control" id="invested_amount" name="invested_amount" placeholder="Enter Number" onchange="curr_unit()">

                            </div>

                        </div>

                       

                        <input type="hidden" class="form-control" id="current_nav" name="current_nav" value="0">

                        <div class="col-sm-4">

                            <div>

                                <label for="sumassuredInput" class="form-label">Current Value</label>

                                <input type="number" class="form-control" id="current_value" name="current_value" placeholder="Enter Number" readonly>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="sumassuredInput" class="form-label">Profit/Loss</label>

                                <input type="number" class="form-control" id="profit_loss" name="profit_loss" placeholder="Enter Number" readonly>

                            </div>

                        </div>

                       

                        <div class="col-sm-12">

                            <div class="hstack gap-2 justify-content-end">

                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary" onclick="savemutualfund()">Save</button>

                            </div>

                        </div>

                    </div>



                    <div class="table-responsive mt-4">

                        <table class="table align-middle mb-0" id="mutual_report">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">Transaction</th>

                                    <th scope="col">Date</th>

                                    <th scope="col">Buy NAV</th>

                                    <th scope="col">Amount</th>

                                    <th scope="col">Units</th>

                                    <th scope="col">Stamp Duty</th>

                                    

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>

                        </table>

                        <!-- end table -->

                    </div>

                    <!-- end table responsive -->

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

                <form id="mutualfund_form">

                    <div class="row g-3">

                        <input type="hidden" name="client_id" id="client_id" value="<?php echo e($id); ?>">

                        <input type="hidden" name="bond_id" id="bond_id" value="">

                        <div class="col-sm-9">

                            <div>

                                <label for="insurancefirmInput" class="form-label">Bond Name<span class="red">*</span></label>
                                <input type="text" class="form-control" name="bond_name" id="bond_name" placeholder="Enter Bond Name" required>

                                </select>

                            </div>

                        </div>
                        <div class="col-sm-3">

                            <div>

                                <label for="schemenameInput" class="form-label">ISIN<span class="red">*</span></label>

                               <input type="text" class="form-control" name="scrip_name" id="scrip_name" placeholder="Enter ISIN No" required>

                            </div>

                        </div>

                        


                        <div class="col-sm-3">

                            <div>

                                <label for="sumassuredInput" class="form-label">Current Amount</label>

                                <input type="number" class="form-control" id="total" name="total" placeholder="Enter Number" onchange="curr_unit()">

                            </div>

                        </div>

                        <div class="col-sm-1">

                            <div>

                                <label for="sumassuredInput" class="form-label">Platform</label>

                                <input type="text" class="form-control" id="platform" name="platform" placeholder="Enter platform" readonly>

                            </div>

                        </div>

                      

                        <div class="col-sm-2">
                            <div>
                                <label for="sumassuredInput" class="form-label">Platform Client ID</label>
                                <input type="text" class="form-control" id="client_code" name="client_code" placeholder="Enter Platform Client ID" >
                            </div>
                        </div>
                       

                        <div class="col-sm-12">

                            <div class="hstack gap-2 justify-content-end">

                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                                <!-- <button type="button" class="btn btn-primary" onclick="savemutualfund()">Save</button> -->

                            </div>

                        </div>

                    </div>



                    <div class="table-responsive mt-4">
                        <table class="table align-middle mb-0" id="bond_report">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->

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

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form action="javascript:void(0);">

                    <div class="row g-3">

                        <div class="col-sm-4">

                            <div>

                                <label for="nameInput" class="form-label">Insured Person Name<span class="red">*</span></label>
                                <input type="name" class="form-control" id="proposer_name" placeholder="Enter Nominee Name" >

                            </div>

                        </div>

                        

                        <div class="col-sm-4">

                            <div>

                                <label for="insurancefirmInput" class="form-label">Insurance Firm<span class="red">*</span></label>

                                <input type="name" class="form-control" id="company_name" placeholder="Enter Insurance Firm" >

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="schemenameInput" class="form-label">Scheme Name<span class="red">*</span></label>

                                <input type="text" class="form-control" id="plan_name" placeholder="Enter Scheme Name" >

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="policynoInput" class="form-label">Policy No<span class="red">*</span></label>

                                <input type="text" class="form-control" id="policy_no" name="policy_no" placeholder="Enter Pollicy Number" required>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="paymentInput" class="form-label">Payment Start Date<span class="red">*</span></label>

                               <input type="date" class="form-control" id="issue_date" placeholder="datepicker-range" required>



                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="paymentInput" class="form-label">Payment End Date</label>

                                <input type="date" class="form-control" id="post_date" placeholder="datepicker-range" required>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="close-date-Input" class="form-label">Maturity Date</label>

                                <input type="date" class="form-control" id="risk_date" placeholder="date" required>

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="sumassuredInput" class="form-label">Sum Assured</label>

                                <input type="number" class="form-control" id="sum_assured" placeholder="Enter Number" >

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="primumInput" class="form-label">Perimum</label>

                                <input type="number" class="form-control" id="total_permium" placeholder="Enter Number" >

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div>

                                <label for="dateofBirth" class="form-label">Mode</label>

                                <input type="text" class="form-control" id="mode" placeholder="Enter Number" >

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

                        
                       

             

                       

                        

                        <div class="col-sm-12">

                            <div class="hstack gap-2 justify-content-end">

                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                                

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

 <!-- removeItemModal -->

 <div id="removeScheme" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"

                    id="btn-close"></button>

            </div>

            <div class="modal-body">

                <div class="mt-2 text-center">

                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"

                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>

                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">

                        <h4>Are you Sure ?</h4>

                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Mutual Fund?</p>

                    </div>

                </div>

                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">

                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                    <button type="button" class="btn w-sm btn-danger" id="delete-mutual">Yes, Delete It!</button>

                </div>

            </div>



        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

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

<script>

    $(document).ready(function(){

      var mutual_fund_table =$('#mutual_fund_table').DataTable({

      proccessing: true,

      serverSide: true,

      searching: true,

      bFilter: true,

      ajax: {

          url: base_url+"mutual_fund/list",

          type: "POST",

          data:function(d) {

          d.client_id=$('[name=client_id]').val();

      },

          },

      columns: [

         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},

          { data: 'scheme_name',render: function (data, type, row, meta) {return `${row.scheme_name} (${row.folio_no})`} },

        //   { data: 'folio_no' },

          { data: 'plan' },

        //   { data: 'purchase_date'},

          { data: 'nav' },

          { data: 'invested_amount',render:function(data,type,row){return data.toLocaleString(); } },

          {data:'current_unit'},

          {data:'current_value',render:function(data,type,row){return data.toLocaleString(); }},

          {data:'profit_loss',render:function(data,type,row){return data.toLocaleString(); }},

          { data: 'id',render:function(data,type,row){ 

              return `<div class="dropdown">

                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                      <i class="ri-more-fill"></i>

                      </button>

                      <ul class="dropdown-menu dropdown-menu-end">

                      <li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" onclick="editmutual(${data})"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                      <li class="dropdown-divider"></li>

                      <li><a class="dropdown-item remove-list" href="#" data-id='${data}' onclick="deletemodel(${data})" ><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>

                      </ul>

                      </div>`

          } 

           },

          

         

      ]

  });





  var life_table =$('#life_table').DataTable({

      proccessing: true,

      serverSide: true,

      searching: true,

      bFilter: true,

      ajax: {

          url: base_url+"listlife_insurance",

          type: "POST",

          data:function(d) {

          d.client_id=$('[name=client_id]').val();

      },

          },

      columns: [

         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},

          { data: 'proposer_name' },

          { data: 'plan_type' },

          { data: 'policy_no' },

          { data: 'company_name'},

          { data: 'plan_name' },

          { data: 'mode_payment' },

          { data: 'issue_date', },

          {data:'risk_date'},

          {data:'total_permium'},

          {data:'status'},

          { data: 'id',render:function(data,type,row){ 

              return `<div class="dropdown">

                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                      <i class="ri-more-fill"></i>

                      </button>

                      <ul class="dropdown-menu dropdown-menu-end">

                      <li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" data-edit-id='${data}' href="#" onclick="editlife(${data})"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                      </ul>

                      </div>`

          } 

           },

          

         

      ]

  });





  var health_table =$('#health_table').DataTable({

      proccessing: true,

      serverSide: true,

      searching: true,

      bFilter: true,

      ajax: {

          url: base_url+"gethealth_insurance",

          type: "POST",

          data:function(d) {

          d.client_id=$('[name=client_id]').val();

      },

          },

      columns: [

         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},

          { data: 'proposer_name' },

          { data: 'plan_type' },

          { data: 'policy_no' },

          { data: 'company_name'},

          { data: 'plan_name' },

          { data: 'issue_date', },

          {data:'risk_exp_date'},

          {data:'total_permium'},

          {data:'sum_assured'},

          { data: 'id',render:function(data,type,row){ 

              return `<div class="dropdown">

                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                      <i class="ri-more-fill"></i>

                      </button>

                      <ul class="dropdown-menu dropdown-menu-end">

                      <li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li

                      </ul>

                      </div>`

          } 

           },

          

         

      ]

  });

  var bond_table =$('#bond_table').DataTable({

proccessing: true,

serverSide: true,

searching: true,

bFilter: true,

ajax: {

    url: base_url+"listbonds",

    type: "POST",

    data:function(d) {

    d.client_id=$('[name=client_id]').val();

},

    },

columns: [

   // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},

    { data: 'bond_name' },

    { data: 'total' },

    { data: 'start_date' },

    { data: 'client_name'},

    { data: 'platform' },

    { data: 'id',render:function(data,type,row){ 

        return `<div class="dropdown">

                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                <i class="ri-more-fill"></i>

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                <li><a class="dropdown-item edit-list" data-edit-id='${data}' onclick="editbond(${data})" href="#" ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>

                <li class="dropdown-divider"></li>


                </ul>

                </div>`

    } 

     },

    

   

]

});

    });

</script>

<?php $__env->stopSection(); ?>

<!--

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
-->
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\vitkom-admin-panel\resources\views/user_dashboard.blade.php ENDPATH**/ ?>