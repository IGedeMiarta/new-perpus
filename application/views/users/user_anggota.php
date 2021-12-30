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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Anggota</a></li>
                            <li class="breadcrumb-item active">Data Anggota</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Anggota</h4>
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
                <h4 class="text-light">Tabel Anggota</h4>
            </div>
            <div class="card-body bg-white">
                <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add</a>
                <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama </th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($anggota as $b) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->nis ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?php
                                    if ($b->jenis_kel == 'L') {
                                        echo 'Laki - Laki';
                                    } else {
                                        echo 'Perempuan';
                                    }
                                    ?></td>
                                <td><?= $b->no_hp ?></td>
                                <td><?= $b->alamat ?></td>
                                <td><?= $b->status ?></td>
                                <td width="12%">
                                    <a href="" class="btn btn-warning edit-anggota" data-toggle="modal" data-id="<?= $b->id_anggota ?>" data-target="#modelEdit"> <i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('users/deleteAnggota/') . $b->id_anggota ?>" class="btn btn-danger delete"> <i class="fas fa-trash"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_kategori" method="POST" action="">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nomer Induk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nis" name="nis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenkel" id="jenkel" class="form-control">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="hp" name="hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status Anggota</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="L">--Pilih</option>
                                    <?php foreach ($status as $s) : ?>
                                        <option value="<?= $s->id_status_anggota ?>"><?= $s->status ?></option>
                                    <?php endforeach ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_petugas" method="POST" action="<?= base_url('users/updateAnggota') ?>">
                        <input type="text" class="form-control" id="e_id" name="id" hidden>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_nip" name="nis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="e_nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenkel" id="e_jenkel" class="form-control">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="e_hp" name="hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" id="e_alamat" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="e_status" class="form-control">
                                    <option value="L">--Pilih</option>
                                    <?php foreach ($status as $s) : ?>
                                        <option value="<?= $s->id_status_anggota ?>"><?= $s->status ?></option>
                                    <?php endforeach ?>
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