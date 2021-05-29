<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Regist Form</h2>
        </div>


        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('login/regist') ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password1" id="name" class="form-control" id="exampleInputPassword1">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Retype Password</label>
                        <input type="password" name="password2" id="name" class="form-control" id="exampleInputPassword1">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama" id="name" class="form-control" id="exampleInputPassword1">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Hp</label>
                        <input type="text" name="hp" id="hp" class="form-control" id="exampleInputPasstext">
                        <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" id="exampleInputPasstext">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>