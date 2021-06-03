<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Metrica</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail Buku</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <!-- sweet alert -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>
        <div class="flash-delete" data-delete="<?= $this->session->flashdata('delete') ?>"></div>
        <!-- end sweet alert -->


        <div class="card">
            <div class="card-header">

                <div class="card">
                    <div class="card-header bg-white" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/images/book.png') ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body bg-transparent">
                                    <table>
                                        <tr>
                                            <td></td>
                                            <td> <b>Kode</b></td>
                                            <td width="5%"></td>
                                            <td>:</td>
                                            <td><b><?= $buku['kd_buku'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> Judul</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $buku['judul'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> Tahun Terbit</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $buku['th_terbit'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> Penulis</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $buku['nama_pengarang'] ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> Penerbit</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $buku['nama_penerbit']  ?></td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-success detail-buku" href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $id ?>"><i class="fa fa-plus"></i> Detail Buku</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">No</th>

                                <th>Kode</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Rak Buku</th>
                                <th>Status</th>
                                <th width="10%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->kd_detail; ?></td>
                                    <td><?php echo $d->judul; ?></td>
                                    <td><?php echo $d->th_terbit; ?></td>
                                    <td><?php echo '<b>[ ' . $d->nama_rak . ' ] </b>' . $d->detail ?></td>
                                    <td>
                                        <?php
                                        if ($d->status_buku == "1") {
                                            echo "<span class='badge badge-success'>Tersedia</span>";
                                        } else {
                                            echo "<span class='badge badge-warning'>Sedang Dipinjam</span>";
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <strong>Opsi</strong>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_edit/' . $d->kd_detail; ?>"><i class="far fa-fw fa-edit"></i> Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_hapus/' . $d->kd_detail; ?>" onclick="return confirm(' Yakin Hapus Buku ?')"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                // }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div><!-- container -->



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="form_bookdetail">
                        <div class="form-group">
                            <label class="font-weight-bold" for="cari">Kode Buku</label>
                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="cari">Kode Detail Buku</label>
                            <input type="text" class="form-control" id="kd_detail" name="kd_detail" value="" readonly>
                        </div>
                        <!-- <div class="form-group">
                            <label class="font-weight-bold" for="cari">Jumlah Buku</label>
                            <input type="text" class="form-control" id="jumalah" name="jumalah" value="">
                        </div> -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="judul">Rak Buku</label>
                            <select name="rak" class="form-control" id="">
                                <option value="">--pilih</option>
                                <?php foreach ($rak as $r) : ?>
                                    <option value="<?= $r->id_rak ?>"><?= $r->nama_rak . ' - ' . $r->detail ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>