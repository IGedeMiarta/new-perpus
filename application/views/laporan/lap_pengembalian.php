<!-- Page Content-->
<div class="page-content">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                            <li class="breadcrumb-item active">Pengembalian</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pengembalian</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Pengembalian</h4>
            </div>
            <div class="card-body bg-white">
                <a href="<?= base_url('laporan/cetakPegembalian') ?>" target="_blank" class="btn btn-danger float-left mr-2"><i class="fas fa-file-pdf"></i></i> Import PDF</a>
               
            <table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Kembali </th>
                            <th>Nomer Induk </th>
                            <th>Nama Peminjam </th>
                            <th>Kode Buku </th>
                            <th>Judul Buku</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengembalian as $b) { ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d F Y', strtotime($b->tgl_kembali)) ?></td>
                                <td><?= $b->nis ?></td>
                                <td><?= $b->nama ?></td>
                                <td><?= $b->kd_detail ?></td>
                                <td><?= $b->judul ?></td>
                                <td><?= $b->status_kembali ?></td>
                                <!-- <td>
                                    <a href="" class="btn btn-warning edit-pengembalian" data-toggle="modal" data-id="<?= $b->id_pengembalian ?>" data-target="#modelEdit"> <i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('peminjaman/deletePeminjaman/') . $b->id_peminjaman ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                                </td> -->
                            </tr>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->
