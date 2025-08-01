<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php require_once('layout/_css.php') ?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SKANDAKRA</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <div id="menghilang">
                                <?php echo $this->session->flashdata('alert',true); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <?php require_once('layout/_js.php') ?>
</body>

</html>