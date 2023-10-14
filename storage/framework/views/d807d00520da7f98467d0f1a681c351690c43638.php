<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="" height="80">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="" height="80">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(url('/')); ?>"  >
                        <i class="ri-dashboard-2-line" ></i> <span>Dashboard</span>
                    </a>
                </li> 
                
              <?php if(Auth::user()->role==1): ?>
              

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(url('/sellers')); ?>"  >
                        <i class="ri-account-circle-line" ></i> <span>Sellers</span>
                    </a>
                </li> 
             <?php endif; ?>
             <?php
                 if(Auth::user()->role==999)
                 {
                    $approve=\App\Models\Seller::where(['id' => Auth::user()->seller_id])->where(['profile_status' => 0])->get();
                    $final=count($approve)>0 ? 1:0;
                 }
                 else{
                    $final=1;
                 }
             ?>
              
             <?php if($final==1): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(url('/product')); ?>"  >
                        <i class="ri-dashboard-2-line" ></i> <span>Products</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(url('/orders')); ?>"  >
                        <i class="ri-file-edit-line" ></i> <span>Orders</span>
                    </a>
                </li> 
            <?php endif; ?>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\xampp\htdocs\order_now_admin\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>