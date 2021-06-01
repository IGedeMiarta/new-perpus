<div class="page-wrapper">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <ul class="metismenu left-sidenav-menu">
            <li>
                <a href="<?= base_url('admin/index') ?>"><i class="ti-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="<?= base_url('admin/petugas') ?>"><i class="ti-user"></i><span>Petugas</span></a>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="ti-book"></i><span>Buku</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('admin/book') ?>"><i class="ti-control-record"></i>Data Buku</a></li>
                    <li class="nav-item"><a href="<?= base_url('admin/kategori') ?>"><i class="ti-control-record"></i>Kategori Buku</a></li>
                    <li class="nav-item"><a href="<?= base_url('admin/pengarang') ?>"><i class="ti-control-record"></i>Pengarang</a></li>
                    <li class="nav-item"><a href="<?= base_url('admin/penerbit') ?>"><i class="ti-control-record"></i>Penerbit</a></li>
                    <li class="nav-item"><a href="<?= base_url('admin/rak') ?>"><i class="ti-control-record"></i>Rak</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="fas fa-users"></i><span>Anggota</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('anggota') ?>"><i class="ti-control-record"></i>Anggota Baru</a></li>
                    <li class="nav-item"><a href="#"><i class="ti-control-record"></i>Data Anggota</a></li>
                    <li class="nav-item"><a href="#"><i class="ti-control-record"></i>Cetak Kartu</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="ti-wallet"></i><span>Donasi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('donasi') ?>"><i class="ti-control-record"></i>Data Donasi</a></li>
                    <li class="nav-item"><a href="#"><i class="ti-control-record"></i>Data Donatur</a></li>
                </ul>
            </li>




        </ul>
    </div>
    <!-- end left-sidenav-->