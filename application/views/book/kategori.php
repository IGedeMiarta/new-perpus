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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Buku</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Kategori</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>
        <div class="flash-delete" data-delete="<?= $this->session->flashdata('delete') ?>"></div>


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Kategori Buku</h4>
            </div>
            <div class="card-body bg-white">
                <?php if($this->session->userdata('role')){ ?>
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add</button>
                <?php }?>
                <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode </th>
                            <th>Nama Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;

                        foreach ($kategori as $b) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->kd_kategori ?></td>
                                <td><?= $b->nama_kategori ?></td>
                            <?php if($this->session->userdata('role') == 'Petugas'){ ?>

                                <td>
                                    <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('buku/deleteKategori/') . $b->id_kategori ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                <?php }else{?>
                                    <td>
                                        <p class="text-center">-</p>
                                    </td>
                                    <?php }?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_kategori" method="POST" action="">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $kd_kategori ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama">
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