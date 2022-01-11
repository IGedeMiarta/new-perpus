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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Donation</a></li>
                            <li class="breadcrumb-item active">Donation</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Donation</h4>
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


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Donation</h4>
            </div>
            <div class="card-body bg-white">
                <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add</a>
                <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal </th>
                            <th>Donatur</th>
                            <th>No Hp</th>
                            <th>Donasi</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;

                        foreach ($donasi as $b) { ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d M Y', strtotime($b->tgl_donasi)) ?></td>
                                <td><?= $b->nama_donatur ?></td>
                                <td><?= $b->no_hp ?></td>
                                <td><?= isset($b->jml_donasi)?"Rp " . number_format($b->jml_donasi):'BUKU - ['.$b->buku.'] '.$b->judul ?></td>
                                <td><?= $b->keterangan ?></td>
                                <td><?= $b->status_donasi ?></td>
                                <td>
                                    <a href="" class="btn btn-warning edit-donasi" data-toggle="modal" data-id="<?= $b->id_donasi ?>" data-target="#modelEdit"> <i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('donasi/deleteDonasi/') . $b->id_donasi ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_kategori" method="POST" action="">
                       
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Donatur</label>
                            <div class="col-sm-10">
                                <select name="donatur" id="donatur" class="form-control select2">
                                    <option>-Select Donatur</option>
                                    <?php foreach ($donatur as $d) : ?>
                                        <option value="<?= $d->id_donatur ?>"><?= $d->nama_donatur ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Donasi</label>
                            <div class="col-sm-10">
                                <select name="jenis" id="jenis" class="form control select2" onchange="donasi()">
                                    <option >-Pilih</option>
                                    <option value="uang">Uang</option>
                                    <option value="buku">Buku</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="jumlah-donasi">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Donasi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jml" name="jml">
                            </div>
                        </div>
                       

                        <div class="form-group row d-none" id="kode-donasi">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Kode Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="kd_buku" class="form-control" value="BK<?php echo sprintf("%04s", $kd_buku) ?>">
                            </div>
                        </div>

                        <div class="form-group row d-none" id="judul-donasi">
                            <label class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="form-group row d-none" id="tahun-donasi">
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
                        <div class="form-group row d-none" id="pengarang-donasi">
                            <label class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <select name="pengarang" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($pengarang as $k) : ?>
                                        <option value="<?= $k->kd_pengarang ?>"><?= $k->nama_pengarang ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="penerbit-donasi">
                            <label class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10">
                                <select name="penerbit" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($penerbit as $k) : ?>
                                        <option value="<?= $k->kd_penerbit ?>"><?= $k->nama_penerbit ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="kategori-donasi">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori" id="" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k->kd_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group row d-none" id="rak-donasi">
                            <label class="col-sm-2 col-form-label">Rak</label>
                            <div class="col-sm-10">
                               <select name="rak" class="form-control" id="">
                                    <option value="">--pilih</option>
                                    <?php foreach ($rak as $r) : ?>
                                        <option value="<?= $r->id_rak ?>"><?= $r->nama_rak . ' - ' . $r->detail ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row " id="keterangan-donasi">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterengan</label>
                            <div class="col-sm-10">
                                <textarea name="ket" id="ket" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="status">
                                    <option value="">--Pilih</option>
                                    <option value="sumbangan">Sumbangan</option>
                                    <option value="denda">Denda</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Donatur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_petugas" method="POST" action="<?= base_url('donasi/updateDonasi') ?>">
                        <input type="hidden" class="form-control" id="e_id" name="id" > <input type="hidden" name="detail_donasi" id="detail_donasi">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Donatur</label>
                            <div class="col-sm-10">
                                <select name="donatur" id="e_donatur" class="form-control ">
                                    <option>-Select Donatur</option>
                                    <?php foreach ($donatur as $d) : ?>
                                        <option value="<?= $d->id_donatur ?>"><?= $d->nama_donatur ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Donasi</label>
                            <div class="col-sm-10">
                                <select name="jenis" id="e_jenis" class="form-control " onchange="donasi()">
                                    <option >-Pilih</option>
                                    <option value="uang">Uang</option>
                                    <option value="buku">Buku</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="e_jumlah-donasi">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Donasi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="e_jml" name="jml">
                            </div>
                        </div>
                       
                            <input type="hidden" name="isbn" id="isbn">
                            <input type="hidden" name="id_detail" id="id_detail">
                        <div class="form-group row d-none" id="e_kode-donasi">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Kode Buku</label>
                            <div class="col-sm-10">
                                <input type="text" name="kd_buku" class="form-control" id="e_kode" value="">
                            </div>
                        </div>

                        <div class="form-group row d-none" id="e_judul-donasi">
                            <label class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" id="e_judul" class="form-control" name="judul" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="form-group row d-none" id="e_tahun-donasi">
                            <label class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tahun" id="e_tahun">
                                    <option value="">- Pilih tahun</option>
                                    <?php for ($tahun = date('Y'); $tahun >= 2010; $tahun--) { ?>
                                        <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row d-none" id="e_pengarang-donasi">
                            <label class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <select name="pengarang" id="e_pengarang" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($pengarang as $k) : ?>
                                        <option value="<?= $k->kd_pengarang ?>"><?= $k->nama_pengarang ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="e_penerbit-donasi">
                            <label class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10">
                                <select name="penerbit" id="e_penerbit" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($penerbit as $k) : ?>
                                        <option value="<?= $k->kd_penerbit ?>"><?= $k->nama_penerbit ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="e_kategori-donasi">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori" id="e_kategori" class="form-control">
                                    <option value="">--Pilih</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k->kd_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group row d-none" id="e_rak-donasi">
                            <label class="col-sm-2 col-form-label">Rak</label>
                            <div class="col-sm-10">
                               <select name="rak" class="form-control" id="e_rak">
                                    <option value="">--pilih</option>
                                    <?php foreach ($rak as $r) : ?>
                                        <option value="<?= $r->id_rak ?>"><?= $r->nama_rak . ' - ' . $r->detail ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row " id="e_keterangan-donasi">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterengan</label>
                            <div class="col-sm-10">
                                <textarea name="ket" id="e_ket" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="e_status">
                                    <option value="">--Pilih</option>
                                    <option value="sumbangan">Sumbangan</option>
                                    <option value="denda">Denda</option>
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