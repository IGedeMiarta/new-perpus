
    <!-- Log In page -->
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="#" class="logo logo-admin">
                                    <img src="<?= base_url() ?>/assets/images/logo.png" height="55" alt="logo" class="auth-logo">
                                </a>
                            </div>
                            <h2 class="text-center mt-3 mb-2">Login Form</h4>
                           <form id="auth" class="mt-3">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control outline-warning inp-error" id="inp-user" aria-describedby="emailHelp" name="user" >
                                <small id="user" class="form-text text-warning"> </small>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1" >Password</label>
                                <input type="password" class="form-control" id="inp-pass" name="password" >
                                <small id="pass" class="form-text text-warning"> </small>
                                
                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end auth-page-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
