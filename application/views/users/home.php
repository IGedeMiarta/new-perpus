<div class="container">
    <div class="card">
        <div class="card-body">
            <img src="<?= base_url('assets/img/profile.png') ?>" width=200 alt="" class="mx-auto d-block">
            <a href="" data-id="<?= $this->session->userdata('id') ?>" class="btn btn-warning float-right edit-user mb-2" data-toggle="modal" data-target="#edit_data"><i class="fas fa-edit"></i> Edit</a>
            <table class="table mt-4">
                <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?= $user['email'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $user['name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">phone</th>
                        <td><?= $user['phone'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td><?= $user['address'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $this->session->flashdata('messege'); ?>

<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="edit_dataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('users/user_update') ?>">
                    <div class="form-group">
                        <input type="text" name="id" class="form-control" id="id" hidden>

                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="name">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Hp</label>
                        <input type="text" name="hp" class="form-control" id="phone">
                        <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="address">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
            </div>
            <div class="modal-footer center-block">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>