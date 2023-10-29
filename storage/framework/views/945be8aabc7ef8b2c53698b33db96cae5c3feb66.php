
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.bond_user_entry'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card card-animate">
                        <div class="card-body">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/bond_user_entry_master.blade.php ENDPATH**/ ?>