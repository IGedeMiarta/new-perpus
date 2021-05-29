<div class="container">
    <div class="card">
        <div class="card-body">
            <img src="<?= base_url('assets/img/profile.png') ?>" width=200 alt="" class="mx-auto d-block">
            <table class="table table-borderless mt-4">
                <tbody>
                    <tr>
                        <th>Data User</th>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td><?= $user['email'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Name</td>
                        <td><?= $user['name'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">phone</td>
                        <td><?= $user['phone'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Address</td>
                        <td><?= $user['address'] ?></td>


                        <?php $id = $this->session->userdata('id');
                        $edu = $this->db->query("SELECT * FROM educations WHERE id_user = $id")->row_array();

                        if ($edu) { ?>
                    <tr>
                        <th>Educations</th>
                    </tr>
                    <tr>
                        <td scope="row">Education</td>
                        <td><?= $edu['name'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Level</td>
                        <td><?= $edu['level'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Start Date</td>
                        <td><?= date('d F Y', strtotime($edu['start_date'])) ?></td>
                    </tr>
                    <tr>
                        <td scope="row">End Date</td>
                        <td><?= date('d F Y', strtotime($edu['end_date'])) ?></td>
                    </tr>
                <? } else { ?>
                    <tr>

                    </tr>
                <?php  }
                        $id = $this->session->userdata('id');
                        $emp = $this->db->query("SELECT * FROM employments WHERE id_user = $id")->row_array();
                        if ($emp) { ?>
                    <tr>
                        <th>Employments</th>
                    </tr>
                    <tr>
                        <td scope="row">Level</td>
                        <td><?= $emp['level'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Employments Name</td>
                        <td><?= $emp['employment_name'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Company</td>
                        <td><?= $emp['company'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Start Date</td>
                        <td><?= date('d F Y', strtotime($emp['start_date'])) ?></td>
                    </tr>
                    <tr>
                        <td scope="row">End Date</td>
                        <td><?= date('d F Y', strtotime($emp['end_date'])) ?></td>
                    </tr>

                <?php } else { ?>
                    <tr>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>