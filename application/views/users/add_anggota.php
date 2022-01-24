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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Petugas</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Petugas</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <!-- sweet alert -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messege') ?>"></div>
        <div class="flash-update" data-update="<?= $this->session->flashdata('update') ?>"></div>
        <div class="flash-delete" data-delete="<?= $this->session->flashdata('delete') ?>"></div>
        <!-- end sweet alert -->


        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-light">Tambah User Anggota</h4>
            </div>
                <div class="card-body bg-white">
                    <form id="regist" class="mt-3" method="POST" action="<?= base_url('users/tambah/'.$id) ?>">
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control outline-warning inp-error" id="inp-user" aria-describedby="emailHelp" name="email" >
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1" >Password</label>
                            <input type="password" class="form-control" id="inp-pass" name="password1" >
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1" >Retype Password</label>
                            <input type="password" class="form-control" id="inp-pass1" name="password2" >
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    
                    </form>
                </div>
        </div>

    </div><!-- container -->
