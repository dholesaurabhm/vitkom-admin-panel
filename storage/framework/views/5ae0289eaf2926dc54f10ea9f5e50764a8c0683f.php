
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.dashboards'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total AUM</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">0</span>k </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                 <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total SIP</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                        <span class="counter-value" data-target="36894">0</span>
                                    </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                        <i class="bx bx-shopping-bag text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Renewal</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="183.35">0</span>M </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                        <i class="bx bx-user-circle text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Redemption</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-muted fs-14 mb-0">
                                        +0.00 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="165.89">0</span>k </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                        <i class="bx bx-wallet text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Client Search</h4>
                        </div><!-- end card header -->

                        <div class="card-header p-0 border-0 bg-light-subtle">
                            <div class="row text-center">
                                <div class="col-sm-12">
                                    <div>
                                        <div class="input-group" style="padding: 10px;">
                                            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0 pb-2">
                            <div class="w-100">
                               <div class="table-responsive mt-3" style="padding: 5px 15px;">
                                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                                            <tbody class="border-0">
                                                <tr style="padding: 5px !important;border: 1px solid darkgray;">
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0">ID: 0001</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Saurabh Dhole</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">dhlesauabhm@gmail.com</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">+91 8421949746</p>
                                                    </td>
                                                    <td class="text-end">
                                                       <a href="<?php echo e(url('/user_dashboard')); ?>">View Dashboad</a>
                                                    </td>
                                                </tr>
                                                <tr style="padding: 5px !important;border: 1px solid darkgray;">
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0">ID: 0001</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Saurabh Dhole</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">dhlesauabhm@gmail.com</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">+91 8421949746</p>
                                                    </td>
                                                    <td class="text-end">
                                                       <a href="<?php echo e(url('/user_dashboard')); ?>">View Dashboad</a>
                                                    </td>
                                                </tr>
                                                <tr style="padding: 5px !important;border: 1px solid darkgray;">
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0">ID: 0001</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Saurabh Dhole</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">dhlesauabhm@gmail.com</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">+91 8421949746</p>
                                                    </td>
                                                    <td class="text-end">
                                                       <a href="<?php echo e(url('/user_dashboard')); ?>">View Dashboad</a>
                                                    </td>
                                                </tr>
                                                <tr style="padding: 5px !important;border: 1px solid darkgray;">
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0">ID: 0001</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Saurabh Dhole</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">dhlesauabhm@gmail.com</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">+91 8421949746</p>
                                                    </td>
                                                    <td class="text-end">
                                                       <a href="<?php echo e(url('/user_dashboard')); ?>">View Dashboad</a>
                                                    </td>
                                                </tr>
                                            </tbody>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->


<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/index.blade.php ENDPATH**/ ?>