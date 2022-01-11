<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
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
                <h4 class="text-light">Tabel Peminjaman Aktif</h4>
            </div>
            <div class="card-body bg-white">
                <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modalPeminjaman"><i class="fas fa-plus"></i> Add</a>
                
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
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peminjaman as $b) { ?>
                            <?php if($b->detail != 2){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->tgl_perpanjang ? date('d M Y', strtotime($b->tgl_perpanjang)) : date('d M Y', strtotime($b->tgl_pinjam)) ?></td>
                                <td><?= $b->id_peminjaman ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?= $b->judul ?></td>
                                <td><?= date('d M Y', strtotime($b->batas_pinjam)) ?></td>
                                <td><?= $b->status_pinjam ?></td>
                                <!-- <td>
                                    <a href="" class="btn btn-warning edit-peminjaman" data-toggle="modal" data-id="<?= $b->id_peminjaman ?>" data-target="#modelEdit"> <i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('peminjaman/deletePeminjaman/') . $b->id_peminjaman ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                </td> -->
                            </tr>
                            </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- table pemijaman selesai -->
        <div class="card mt-5">
            <div class="card-header bg-success text-center">
                <h4 class="text-light">Tabel Peminjaman Selesai</h4>
            </div>
            <div class="card-body bg-white">
                <!-- <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modalPeminjaman"><i class="fas fa-plus"></i> Add</a> -->
                <table id="datatable" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pinjam </th>
                            <th>Nama Peminjam </th>
                            <th>Judul Buku</th>
                            <th>Batas Pinjam</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peminjaman as $b) { ?>
                            <?php if($b->detail == 2){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->tgl_perpanjang ? date('d M Y', strtotime($b->tgl_perpanjang)) : date('d M Y', strtotime($b->tgl_pinjam)) ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?= $b->judul ?></td>
                                <td><?= date('d M Y', strtotime($b->batas_pinjam)) ?></td>
                                <td><?= $b->status_pinjam ?></td>
                                <!-- <td><center>-</center></td> -->
                            </tr>
                            </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->

    <div class="modal fade modal-peminjaman" id="modalPeminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_kategori" method="POST" action="">
                        <?php if(validation_errors()){ ?>
                            <div class="alert alert-warning" role="alert">
                                <p class="text-white"><?php echo validation_errors() ?></p>
                            </div>
                            <?php } ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Peminjam</label>
                            <div class="col-sm-10">
                                <select name="anggota" id="anggota" class="form-control select2" aria-placeholder="select">
                                    <option value="null" selected disabled>-Select Anggota</option>
                                    <?php foreach ($anggota as $d) : ?>
                                        <option value="<?= $d->id_anggota ?>"><strong><?= $d->nis != '' ? $d->nis . ' - ' : '';  ?></strong><?= $d->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Buku 1</label>
                            <div class="col-sm-10">
                                <select name="buku1" id="buku1" class="form-control select2">
                                    <option value="0" selected disabled>-Select Buku</option>
                                    <?php foreach ($buku1 as $d) : ?>
                                        <option value="<?= $d->id_detail ?>"><?= '[' . $d->kd_buku . '] ' . $d->judul ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Buku 2</label>
                            <div class="col-sm-10">
                                <select name="buku2" id="buku2" class="form-control select3">
                                    <option value="0" selected disabled>-Select Buku</option>
                                    <?php foreach ($buku2 as $d) : ?>
                                        <option value="<?= $d->id_detail ?>"><?= '[' . $d->kd_buku . '] ' . $d->judul ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Buku 3</label>
                            <div class="col-sm-10">
                                <select name="buku3" id="buku3" class="form-control select4">
                                    <option value="0" selected disabled>-Select Buku</option>
                                    <?php foreach ($buku2 as $d) : ?>
                                        <option value="<?= $d->id_detail ?>"><?= '[' . $d->kd_buku . '] ' . $d->judul ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modelEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updatePeminjaman" method="POST" action="<?= base_url('transaksi/updatePeminjaman') ?>">
                        <input type="text" class="form-control" id="e_id" name="id" hidden>
                        <input type="text" class="form-control" id="e_bk2" name="bk" hidden>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="e_tgl" name="tanggal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Peminjam</label>
                            <div class="col-sm-10">
                                <select name="anggota" id="e_anggota" class="form-control select2">
                                    <option>-Select Anggota</option>
                                    <?php foreach ($anggota as $d) : ?>
                                        <option value="<?= $d->id_anggota ?>"><strong><?= $d->nis != '' ? $d->nis . ' - ' : '';  ?></strong><?= $d->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Buku</label>
                            <div class="col-sm-10">
                                <select name="buku" id="e_buku" class="form-control select2">
                                    <option>-Select Buku</option>
                                    <?php foreach ($bukuedt as $d) : ?>
                                        <option value="<?= $d->id_detail ?>"><?= '[' . $d->kd_buku . '] ' . $d->judul ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="e_status" class="form-control">
                                    <option>-Select Status</option>
                                    <?php foreach ($detail as $d) : ?>
                                        <option class="form-control" value="<?= $d->id_detail_peminjaman ?>"><?= $d->status_pinjam ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>