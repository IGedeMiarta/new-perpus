<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Buku</a></li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Buku</h4>
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
        <!-- end sweet alert -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-center">
                            <h4 class="text-light mb-2">Tabel Buku</h4>
                        </div>
                        <div class="card-body bg-white">
                                <a href="<?= base_url('laporan/cetakBuku') ?>" target="_blank" class="btn btn-danger float-left mr-2"><i class="fas fa-file-pdf"></i></i> Import PDF</a>
                                <!-- <a href="<?= base_url('#') ?>" class="btn btn-success float-right mr-2"><i class="far fa-file-excel"></i></i> Import Xls</a> -->
                            <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="1px">No</th>
                                        <th>Kode</th>
                                        <th width="30%">Judul</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;

                                    foreach ($book as $b) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $b->kd_buku ?></td>
                                            <td><?= $b->judul ?></td>
                                            <td><?= $b->nama_pengarang ?></td>
                                            <td><?= $b->nama_penerbit ?></td>
                                            <td><?= $b->th_terbit ?></td>
                                            <td><?= $b->nama_kategori ?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

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