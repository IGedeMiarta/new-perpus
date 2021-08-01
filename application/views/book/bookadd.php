<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Perpustakaan</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Buku</a></li>
                            <li class="breadcrumb-item active">Buku Add</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Buku</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>

        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light mb-2">Tambah Buku</h4>
            </div>
            <div class="card-body bg-white">
                <div class="general-label">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Kode Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="kd_buku" class="form-control" value="BK<?php echo sprintf("%04s", $kd_buku) ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tahun">
                                    <option value="">- Pilih tahun</option>
                                    <?php for ($tahun = date('Y'); $tahun >= 2010; $tahun--) { ?>
                                        <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-8">
                                <select name="pengarang" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($pengarang as $k) : ?>
                                        <option value="<?= $k->kd_pengarang ?>"><?= $k->nama_pengarang ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#pengarang"><i class="ti ti-plus text-white"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-8">
                                <select name="penerbit" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($penerbit as $k) : ?>
                                        <option value="<?= $k->kd_penerbit ?>"><?= $k->nama_penerbit ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#penerbit"><i class="ti ti-plus text-white"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <select name="kategori" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k->kd_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#kategori"><i class="ti ti-plus text-white"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div><!-- container -->

    <div class="modal fade" id="pengarang" tabindex="-1" aria-labelledby="pengarangLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengarang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="general-label">
                        <form action="<?= base_url('buku/AddPengarang') ?>" method="POST">
                            <div class="form-group row">
                                <label for="horizontalInput1" class="col-sm-3 col-form-label">Kode Pengarang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="kd_pengarang" value="<?php echo $kd_pengarang ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="horizontalInput2" class="col-sm-3 col-form-label">Nama Pengarang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_pengarang" id="horizontalInput2" placeholder="Nama Pengarang">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="penerbit" tabindex="-1" aria-labelledby="penerbitLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="general-label">
                        <form action="<?= base_url('buku/AddPenerbit') ?>" method="POST">
                            <div class="form-group row">
                                <label for="horizontalInput1" class="col-sm-2 col-form-label">Kode Penerbit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kd_penerbit" value="<?php echo $kd_penerbit ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="horizontalInput2" class="col-sm-2 col-form-label">Nama Penerbit</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_penerbit" id="horizontalInput2" placeholder="Nama Penerbit">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="kategori" tabindex="-1" aria-labelledby="kategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="general-label">
                        <form action="<?= base_url('buku/AddKategori') ?>" method="POST">
                            <div class="form-group row">
                                <label for="horizontalInput1" class="col-sm-2 col-form-label">Kode kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kd_kategori" value="<?php echo $kd_kategori ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="horizontalInput2" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_kategori" id="horizontalInput2" placeholder="Nama Kategori">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>