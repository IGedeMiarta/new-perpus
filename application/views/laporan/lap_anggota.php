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
                            <li class="breadcrumb-item active">Data Anggota</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Laporan Data Anggota</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Anggota</h4>
            </div>
            <div class="card-body bg-white">
                <a href="<?= base_url('laporan/cetakAnggota') ?>" target="_blank" class="btn btn-danger float-left mr-2"><i class="fas fa-file-pdf"></i></i> Import PDF</a>

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
                                
                            </tr>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->
