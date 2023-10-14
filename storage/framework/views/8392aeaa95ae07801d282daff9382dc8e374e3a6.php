
<?php $__env->startSection('title'); ?>
   Firm Master
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
    Firm Master
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
    Firm
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

    <div class="row">
     
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                
                                  
                            </div>
                         


                            <div class="col-sm-6 text-end">
                                <div>
                                    <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Add Continent</button>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <!-- end card header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    
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



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AMS\resources\views/firm_master.blade.php ENDPATH**/ ?>