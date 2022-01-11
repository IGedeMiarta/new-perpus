<table id="datatable2" class="table table-bordered table-striped table-hover table-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Tanggal Pinjam </th>
            <th>Nomer peminjaman</th>
            <th>Nama Peminjam </th>
            <th>Judul Buku</th>
            <th>Batas Pinjam</th>
            <th>Status</th>
            <!-- <th>Opsi</th> -->
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peminjaman as $b) { ?>
            
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b->tgl_perpanjang ? date('d M Y', strtotime($b->tgl_perpanjang)) : date('d M Y', strtotime($b->tgl_pinjam)) ?></td>
                <td><?= $b->id_peminjaman ?></td>
                <td><?= $b->nama ?></td>
                <td><?= $b->judul ?></td>
                <td><?= date('d M Y', strtotime($b->batas_pinjam)) ?></td>
                <td><?= $b->status_pinjam ?></td>
                <!-- <td>
                    <a href="" class="btn btn-warning edit-peminjaman" data-toggle="modal" data-id="<?= $b->id_peminjaman ?>" data-target="#modelEdit"> <i class="fas fa-edit"></i></a>
                    <a href="<?= base_url('peminjaman/deletePeminjaman/') . $b->id_peminjaman ?>" class="btn btn-danger"> <i class="fas fa-trash"></i></a>
                </td> -->
            </tr>
            </tr>
        <?php } ?>
    </tbody>
</table>
