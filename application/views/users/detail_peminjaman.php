<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Anggota</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                            <li class="breadcrumb-item active">Peminjaman</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Peminjaman</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <!-- sweet alert -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>
        <div class="flash-update" data-update="<?= $this->session->flashdata('update') ?>"></div>
        <div class="flash-delete" data-delete="<?= $this->session->flashdata('delete') ?>"></div>
        <div class="flash-gagal" data-gagal="<?= $this->session->flashdata('gagal') ?>"></div>
        <div class="validate" data-validate="<?php echo validation_errors(); ?>"></div>
        <!-- end sweet alert -->


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Data Peminjaman</h4>
            </div>
            <div class="card-body bg-white">
                <!-- <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modalPeminjaman"><i class="fas fa-plus"></i> Add</a> -->
                
                <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pinjam </th>
                            <th>Nomer peminjaman</th>
                            <th>Nama Peminjam </th>
                            <th>Judul Buku</th>
                            <th>Batas Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peminjaman as $b) { ?>
                          
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->tgl_perpanjang ? date('d M Y', strtotime($b->tgl_perpanjang)) : date('d M Y', strtotime($b->tgl_pinjam)) ?></td>
                                <td><?= $b->kd_peminjaman!=null?$b->kd_peminjaman:'-' ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?= $b->judul ?></td>
                                <td><?= date('d M Y', strtotime($b->batas_pinjam)) ?></td>
                                <td><?= $b->status_pinjam ?></td>
                               
                            </tr>
                            </tr>
                        <?php } ?>
                      
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->
