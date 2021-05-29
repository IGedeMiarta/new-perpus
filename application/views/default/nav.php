<nav class=" mt-5 navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container">
        <a class=" navbar-brand" href="<?= base_url('users') ?>">SpeedyTest</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  ">
                    <a class="nav-link" href="<?= base_url('users') ?>">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('users/edu') ?>">Education</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('users/empl') ?>">Employments</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('users/cv') ?>">CV</a>
                </li>
            </ul>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
        </div>
    </div>
</nav>