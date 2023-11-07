
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.bond_user_entry'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Bonds</h5>
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-personaldetails" role="tab" aria-selected="false" tabindex="-1">
                                                Personal Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-dealdetails" role="tab" aria-selected="false" tabindex="-1">
                                                Deal Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-securitydetails" role="tab" aria-selected="true" tabindex="-1">
                                                Security Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-transactiondetails" role="tab" aria-selected="true" tabindex="-1">
                                                Transaction Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-settelmentdetails" role="tab" aria-selected="true" tabindex="-1">
                                                Settelment Details
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-forfund/securitytransfer" role="tab" aria-selected="true" tabindex="-1">
                                               For Fund/Security Transfer
                                            </a>
                                            
                                        </li>
                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content  text-muted">
                                        <div class="tab-pane" id="base-justified-personaldetails" role="tabpanel">
                                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th>Name</th>
                                                  <th>UCC</th>
                                                  <th>DP ID</th>

                                                </tr>
                                              </thead>
                                            </table>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                                        </div>
                                        <div class="tab-pane active" id="base-justified-dealdetails" role="tabpanel">
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
                                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                                        </div>
                                        <div class="tab-pane" id="base-justified-securitydetails" role="tabpanel">
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
                                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                                        </div>
                                        <div class="tab-pane" id="base-justified-transactiondetails" role="tabpanel">
                                            <h6>Transaction Deals</h6>
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
                                             <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                                        </div>
                                         <div class="tab-pane" id="base-justified-settelmentdetails" role="tabpanel">
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
                                           <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                                        </div>
                                         <div class="tab-pane" id="base-justified-forfund/securitytransfer" role="tabpanel">
                                            <h6>For Fund/Security Transfer</h6>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-forfund/securitytransfer" role="tab" aria-selected="true" tabindex="-1">
                                               For Fund Transfer
                                            </a>
                                        </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-forfund/securitytransfer" role="tab" aria-selected="true" tabindex="-1">
                                               For Bond Transfer
                                            </a>
                                            
                                        </li>
                                           </li>
                                            <p class="mb-0">
                                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                                tattooed craft beer, iphone skateboard locavore carles etsy
                                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            </p>
                                        </div>

                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->


<div class="modal fade" id="exampledetailsModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="base-justified-personaldetails" role="tabpanel">
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="base-justified-dealdetails" role="tabpanel">
              <h5 class="modal-title" id="exampleModalgridLabel">Deal Details</h5>
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="base-justified-securitydetails" role="tabpanel">
              <h5 class="modal-title" id="exampleModalgridLabel">Security Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                    <div class="col-sm-6"> 
                        <div class="col-sm-6">
                            <div>
                                <label for="ISINInput" class="form-label">ISIN<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter ISIN" >
                            </div>
                        </div>
                         </div><!--end col-->
                          <div class="col-sm-6">
                            <div>
                                <label for="coupenrateInput" class="form-label">Coupon Rate<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Order Number" >
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="ISINInput" class="form-label">Security Name<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter ISIN" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="ISINInput" class="form-label">Issuer Name<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter ISIN" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="facevalueInput" class="form-label">Face Value<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Order Number" >
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="maturitydateInput" class="form-label">Maturity Date<span class="red">*</span></label>
                                <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
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
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="base-justified-transactiondetails" role="tabpanel">
              <h5 class="modal-title" id="exampleModalgridLabel">Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                               <div>
                                  <label for="cleanpriceInput" class="form-label">Clean Price<span class="red">*</span></label>
                                 <input type="number" class="form-control" id="number" placeholder="Enter Clean Price" required>
                               </div>
                           </div><!--end col-->
                           <div class="col-sm-6">
                               <div>
                                  <label for="dirtypriceInput" class="form-label">Dirty Price<span class="red">*</span></label>
                                 <input type="number" class="form-control" id="number" placeholder="Enter Dirty Price" required>
                               </div>
                           </div><!--end col-->
                           <div class="col-sm-6">
                            <div>
                                <label for="stampdutyInput" class="form-label">Stamp Duty<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Stamp Duty" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="accruedinterestInput" class="form-label">Accrued Interest<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Accrued Interest" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="yieldtypeInput" class="form-label">Yield Type<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Yield Type" >
                            </div>
                        </div>
                        <div>
                                  <label for="yield(%)Input" class="form-label">Yied(%)<span class="red">*</span></label>
                                 <input type="number" class="form-control" id="number" placeholder="Enter Yied(%" required>
                               </div>
                           </div><!--end col--><div>
                                  <label for="QuentityInput" class="form-label">Quantity<span class="red">*</span></label>
                                 <input type="number" class="form-control" id="number" placeholder="Enter Quantity" required>
                               </div>
                           </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="ISINInput" class="form-label">Total Consideration<span class="red">*</span></label>
                                <input type="text" class="form-control" id="text" placeholder="Enter ISIN" >
                            </div>
                        </div>
                         <!--end col-->
                          
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
            <div class="modal-header" id="base-justified-settelmentdetails" role="tabpanel">
              <h5 class="modal-title" id="exampleModalgridLabel">Settelment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                             <div class="col-sm-6">
                            <div>
                                <label for="settelmentnoInput" class="form-label">Settelment No.<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Settelment Number" >
                            </div>
                        </div><!--end col-->
                         <div class="col-sm-6">
                            <div>
                                <label for="settelmentamountInput" class="form-label">Settelment Amount(To be paid to NSE)<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Settelment Amount" >
                            </div>
                        </div><!--end col-->
                         <div class="col-sm-6">
                            <div>
                                <label for="settelmenttypeInput" class="form-label">Settelment Type<span class="red">*</span></label>
                                <input type="number" class="form-control" id="number" placeholder="Enter Settelment Type" >
                            </div>
                        </div><!--end col-->
                              <div class="col-sm-6">
                            <div>
                                <label for="settelmentdateInput" class="form-label">Settelment Date<span class="red">*</span></label>
                                 <input type="date" class="form-control" id="date" placeholder="datepicker-range" required>
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

<script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/bond_user_entry_master.blade.php ENDPATH**/ ?>