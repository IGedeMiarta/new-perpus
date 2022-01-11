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
                            <li class="breadcrumb-item active">Donasi</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Donasi</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
      

        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tabel Donasi</h4>
            </div>
            <div class="card-body bg-white">
                <a href="<?= base_url('laporan/cetakDonasi') ?>" target="_blank" class="btn btn-danger float-left mr-2"><i class="fas fa-file-pdf"></i></i> Import PDF</a>
               
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
                               
                            </tr>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- container -->
