
    <table cellspacing="0">
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
        </tbody>
    </table>
  