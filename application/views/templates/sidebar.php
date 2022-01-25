<div class="page-wrapper">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <ul class="metismenu left-sidenav-menu">
            
            <?php if($this->session->userdata('role') == 'Admin'){ ?>
           <li>
                <a href="<?= base_url('admin') ?>"><i class="ti-dashboard"></i><span>Dashboard</span></a>
            </li>
           
             <li>
                <a href="javascript: void(0);"><i class="ti-user"></i><span>Management User</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('users/petugas') ?>"><i class="ti-control-record"></i>Petugas</a></li>
                    <li class="nav-item"><a href="<?= base_url('anggota/all') ?>"><i class="ti-control-record"></i>Anggota</a></li>
                   
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="dripicons-user-group"></i><span>Laporan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('laporan/buku') ?>"><i class="ti-control-record"></i>Laporan Buku</a></li>
                    <li class="nav-item"><a href="<?= base_url('laporan/anggota') ?>"><i class="ti-control-record"></i>Laporan Anggota</a></li>
                    <li class="nav-item"><a href="<?= base_url('laporan/peminjaman') ?>"><i class="ti-control-record"></i>Laporan Peminjaman</a></li>
                    <li class="nav-item"><a href="<?= base_url('laporan/pengembalian') ?>"><i class="ti-control-record"></i>Laporan Pengembalian</a></li>
                    <li class="nav-item"><a href="<?= base_url('laporan/donasi') ?>"><i class="ti-control-record"></i>Laporan Donasi</a></li>
                </ul>
            </li>
            
            <?php }
            if($this->session->userdata('role') == 'Petugas'){ ?>
            <li>
                <a href="<?= base_url('petugas') ?>"><i class="ti-dashboard"></i><span>Dashboard</span></a>
            </li>
           
            <li>
                <a href="javascript: void(0);"><i class="ti-book"></i><span>Management Buku</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('buku/book') ?>"><i class="ti-control-record"></i>Buku</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/kategori') ?>"><i class="ti-control-record"></i>Kategori</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/pengarang') ?>"><i class="ti-control-record"></i>Pengarang</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/penerbit') ?>"><i class="ti-control-record"></i>Penerbit</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/rak') ?>"><i class="ti-control-record"></i>Rak</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);"><i class="dripicons-user-group"></i><span>Managemet Anggota</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('users/anggota') ?>"><i class="ti-control-record"></i>Pendaftaran</a></li>
                    <li class="nav-item"><a href="<?= base_url('donasi/donatur') ?>"><i class="ti-control-record"></i>Donatur</a></li>
                    <li class="nav-item"><a href="<?= base_url('users/kartuAnggota') ?>"><i class="ti-control-record"></i>Cetak Kartu Anggota</a></li>
                    <li class="nav-item"><a href="<?= base_url('users/status_anggota') ?>"><i class="ti-control-record"></i>Status Anggota</a></li>
                </ul>
            </li>

            <!-- <li>
                <a href="javascript: void(0);"><i class="ti-wallet"></i><span>Donasi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('donasi') ?>"><i class="ti-control-record"></i>Data Donasi</a></li>
                </ul>
            </li> -->
            <li>
                <a href="javascript: void(0);"><i class="ti-wallet"></i><span>Transaksi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('transaksi/peminjaman') ?>"><i class="ti-control-record"></i>Peminjaman</a></li>
                    <li class="nav-item"><a href="<?= base_url('transaksi/perpanjangan') ?>"><i class="ti-control-record"></i>Perpanjangan</a></li>
                    <li class="nav-item"><a href="<?= base_url('transaksi/pengembalian') ?>"><i class="ti-control-record"></i>Pengembalian</a></li>
                    <li class="nav-item"><a href="<?= base_url('donasi') ?>"><i class="ti-control-record"></i>Donasi</a></li>
                </ul>
            </li>

        <?php }if($this->session->userdata('role') == 'Anggota') { ?>
             <li>
                <a href="<?= base_url('anggota') ?>"><i class="ti-dashboard"></i><span>Dashboard</span></a>
            </li>
            <!-- <li>
                <a href="javascript: void(0);"><i class="ti-book"></i><span>Data Buku</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a href="<?= base_url('buku/book') ?>"><i class="ti-control-record"></i>Buku</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/kategori') ?>"><i class="ti-control-record"></i>Kategori</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/pengarang') ?>"><i class="ti-control-record"></i>Pengarang</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/penerbit') ?>"><i class="ti-control-record"></i>Penerbit</a></li>
                    <li class="nav-item"><a href="<?= base_url('buku/rak') ?>"><i class="ti-control-record"></i>Rak</a></li>
                </ul>
            </li> -->
             <li>
                <a href="<?= base_url('anggota/peminjaman/') ?>"><i class="ti-wallet"></i><span>Status Peminjaman</span></a>
            </li>
           
<?php } ?>
        </ul>
    </div>
    <!-- end left-sidenav-->