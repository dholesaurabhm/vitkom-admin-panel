<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="17">
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
                    <a class="nav-link menu-link" href="index"  >
                        <i class="ri-dashboard-2-line" ></i> <span>Dashboard</span>
                    </a>
                </li>  
          
                 <!-- end Dashboard Menu --> 
              

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span>Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="firm_master" class="nav-link">Firm Master</a>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebaraddress" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaraddress">Address /Location
                                </a>
                                <div class="collapse menu-dropdown" id="sidebaraddress">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="continent" class="nav-link">Continent</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="country" class="nav-link">Country</a>
                                        </li>
            
                                        <li class="nav-item">
                                            <a href="state" class="nav-link">State</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="district" class="nav-link">District</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="city" class="nav-link">City</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="taluka" class="nav-link">Taluka</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="villege" class="nav-link">Villege/Town/Place</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                           
                         
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Registrations</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Licences</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Currency</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Rank</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Party Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Payment Mode Type </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Purchase/Sale Type </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Firm type </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Product Form </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Packeging Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Unit Master</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Unit Conversion </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Tax Master</a>
                            </li>
                           
                            
                        </ul>
                    </div>
                </li>

                
                 <!-- end Dashboard Menu -->


                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH D:\xampp\htdocs\AMS\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>