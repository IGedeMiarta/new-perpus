<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <?php echo $this->session->flashdata('messege'); ?>
            <a href="" data-id="<?= $this->session->userdata('id') ?>" class="btn btn-warning float-right edit-empl mb-2" data-toggle="modal" data-target="#edit_data"><i class="fas fa-edit"></i> Edit</a>

            <table class="table mt-4">
                <tbody>
                    <tr>
                        <th scope="row" width="200">Employments Name</th>
                        <td><?= $empl['employment_name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Level</th>
                        <td><?= $empl['level'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Company</th>
                        <td><?= $empl['company'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Start Date</th>
                        <td><?= date('d F Y', strtotime($empl['start_date'])) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">End Date</th>
                        <td><?= date('d F Y', strtotime($empl['end_date'])) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="edit_dataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('users/empl_update') ?>">

                    <input type="text" name="id" class="form-control" id="id" hidden>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Employments Name</label>
                        <input type="text" name="nama" class="form-control" id="name">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Level</label>
                        <select class="form-control" name="level" id="level">
                            <option value="full_time">full time</option>
                            <option value="part_time">part time</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Name</label>
                        <input type="text" class="form-control" name="company" id="company">
                        <?= form_error('start', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Date</label>
                        <input type="date" class="form-control" name="start" id="start">
                        <?= form_error('start', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Date</label>
                        <input type="date" class="form-control" name="end" id="end">
                        <?= form_error('end', '<small class="text-danger pl-3">', '</small>');  ?>
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