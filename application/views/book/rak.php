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
                            <li class="breadcrumb-item active">Rak </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Rak Buku</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <!-- sweet alert -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>
        <div class="flash-delete" data-flashdelete="<?= $this->session->flashdata('delete') ?>"></div>
        <!-- end sweet alert -->


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Rak</h4>
            </div>
            <div class="card-body bg-white">
                <?php if($this->session->userdata('role')){ ?>
                    <!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add</button> -->
                    <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#modalRak"><i class="fas fa-plus"></i> Add</a>
                <?php }?>
                <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Penerbit</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;

                        foreach ($rak as $b) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $b->nama_rak ?></td>
                                <td><?= $b->detail ?></td>
                            <?php if($this->session->userdata('role') == 'Petugas'){ ?>

                                <td>
                                    <a href="" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('buku/deleteRak/') . $b->id_rak ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
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


    <div class="modal fade" id="modalRak" tabindex="-1" aria-labelledby="modalRakLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRakLabel">Tambah Rak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Rak</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control float-right" id="kode" name="kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Rak</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control float-right" id="nama" name="nama">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
                </form>
            </div>
        </div>
    </div>