f<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>assets/images/logo-sm-dark.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>assets/images/logo-dark.png" alt="" height="40">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>assets/images/logo-sm-light.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>assets/images/logo-light.png" alt="" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>



        </div>

        <div class="d-flex">




            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url(); ?>assets/images/users/avatar-2.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1"><?= $_COOKIE['staffName']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url() ?>AuthController/logout"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <?php
                if ($_COOKIE['stafftype'] == "Station Staff") {
                ?>
                    <li>
                        <a href="<?= base_url(); ?>dashboard/staff" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Reports</span>
                        </a>
                        <?php
if ($_COOKIE['staffName'] == "Tim Thomas") { ?>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url(); ?>staff/monthreport">Month Report</a></li>
                            <li><a href="<?= base_url(); ?>staff/weekreport">Weekly Report</a></li>
                            <li><a href="<?= base_url(); ?>staff/dailyreport">Daily Report</a></li>
                            <li><a href="<?= base_url(); ?>staff/previousreports">Previous Reports</a></li>
                        </ul>
                        <?php } ?>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-folder-user-line"></i>
                            <span>Student Council</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url(); ?>council/createnew">Create New Council</a></li>
                            <li><a href="<?= base_url(); ?>council/manage">Manage Council</a></li>
                            <!--<li><a href="<?= base_url(); ?>council/createareacouncil">Create Area Council</a></li>-->
                            <!--<li><a href="<?= base_url(); ?>council/manageareacouncil">Manage Area Council</a></li>-->
                            <!--<li><a href="<?= base_url(); ?>council/createareacouncil">Create District Council</a></li>-->
                            <!--<li><a href="<?= base_url(); ?>council/manageareacouncil">Manage District Council</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>leaders" class=" waves-effect">
                            <i class="ri-folder-user-line"></i>
                            <span>Student Leaders</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url(); ?>institutes" class=" waves-effect">
                            <i class="ri-team-fill"></i>
                            <span>Institutes</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-group-line"></i>
                            <span>CGPF</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url(); ?>cgpf/createnew">Create New</a></li>
                            <li><a href="<?= base_url(); ?>cgpf/manage">Manage</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>weeklygroups" class=" waves-effect">
                            <i class="ri-todo-line"></i>
                            <span>Weekly Groups</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>churches" class=" waves-effect">
                            <i class="ri-price-tag-2-line"></i>
                            <span>Churches</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masters/locations" class=" waves-effect">
                            <i class="ri-map-pin-user-line"></i>
                            <span>Locations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class=" waves-effect">
                            <i class="ri-attachment-line"></i>
                            <span>Notices</span>
                        </a>
                    </li>

                <?php
                }
                if ($_COOKIE['stafftype'] == "Admin Staff") {
                ?>
                    <li class="menu-title">Admin Level</li>
                    <li>
                        <a href="<?= base_url(); ?>dashboard/admin" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url(); ?>staff/adminmonthreport">Staff Report</a></li>
                            <li><a href="#">Regional Staff Report</a></li>
                            <li><a href="<?= base_url(); ?>logs">Login Logs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-heart-fill"></i>
                            <span>Staff</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url(); ?>staff/create">Create Staff</a></li>
                            <li><a href="<?= base_url(); ?>staff/manage">Manage Staff</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?= base_url(); ?>stations" class=" waves-effect">
                            <i class="ri-map-pin-user-line"></i>
                            <span>Stations</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>stations/regions" class=" waves-effect">
                            <i class="ri-map-pin-user-line"></i>
                            <span>Regions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class=" waves-effect">
                            <i class="ri-honour-line"></i>
                            <span>Notice</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->