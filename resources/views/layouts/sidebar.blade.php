<!-- ========== App Menu ========== -->

<div class="app-menu navbar-menu">

    <!-- LOGO -->

    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
           <img src="http://localhost:8000/assets/images/logo-light.png" alt="" style="width: 135px;">
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light" style="width: 100% !important;font-size: 20px;color: white;">
           <img src="http://localhost:8000/assets/images/logo-light.png" alt="" style="width: 135px;">
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

                <li class="menu-title"><span>@lang('translation.menu')</span></li>

                <li class="nav-item">

                    <a class="nav-link menu-link" href="{{url('/index')}}"  >

                        <i class="ri-dashboard-2-line" ></i> <span>Dashboard</span>

                    </a>

                </li>  

                <li class="nav-item">

                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">

                        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.master')</span>

                    </a>

                    <div class="collapse menu-dropdown" id="sidebarDashboards">

                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">

                                <a href="{{url('/user_master')}}" class="nav-link">@lang('translation.users')</a>

                            </li>

                            <li class="nav-item">

                                <a href="{{url('/client_master')}}" class="nav-link">@lang('translation.client')</a>

                            </li>

                            <li class="nav-item">

                                <a href="{{url('/insurance_master')}}" class="nav-link">@lang('translation.insurance')</a>

                            </li>

                           <!--  <li class="nav-item">

                                <a href="bonds_master" class="nav-link">@lang('translation.bond')</a>

                            </li>

                            <li class="nav-item">

                                <a href="mutualfund_master" class="nav-link">@lang('translation.mutualfund')</a>

                            </li> -->

                        </ul>

                    </div>

                </li>



                <li class="nav-item">

                    <a class="nav-link menu-link" href="{{url('/data_to_import_master')}}">

                        <i class="ri-honour-line"></i> <span>@lang('translation.data_to_import')</span>

                    </a>

                </li>

                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/report1_master')}}">
                        <i class="ri-honour-line"></i> <span>@lang('translation.report1')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/report2_master')}}">
                        <i class="ri-honour-line"></i> <span>@lang('translation.report2')</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar -->

    </div>

    <div class="sidebar-background"></div>

</div>

<!-- Left Sidebar End -->

<!-- Vertical Overlay-->

<div class="vertical-overlay"></div>

