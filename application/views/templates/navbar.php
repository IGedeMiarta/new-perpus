<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="#" class="logo">
            <span>

                <h3 class="text-light mt-3"> <img src="<?= base_url() ?>/assets/images/logo.png" alt="logo-small" class="logo-sm"> Perpustakaan</h3>
                <img src="<?= base_url() ?>/assets/images/logo.png" alt="logo-large" class="logo-lg logo-dark">
            </span>

        </a>
    </div>
    <!--end logo-->
    <!-- Navbar -->
    <nav class="navbar-custom bg-dark">
        <ul class="list-unstyled topbar-nav float-right mb-0">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= base_url() ?>/assets/images/admin.png" alt="profile-user" class="rounded-circle" />
                    <span class="ml-1 nav-user-name hidden-sm"><?= $this->session->userdata('username')!=null?$this->session->userdata('username'):'Anggota' ; ?> <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('/auth/logout') ?>"><i class="ti-power-off text-muted mr-2"></i> Logout</a>
                </div>
            </li>
        </ul>
        <!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light">
                    <i class="ti-menu nav-icon"></i>
                </button>
            </li>
            <!-- <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search.." class="form-control">
                    <a href=""><i class="ti-search"></i></a>
                </form>
            </li> -->
        </ul>

    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->