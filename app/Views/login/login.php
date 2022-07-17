<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>


                                <?= csrf_field(); ?>
                                <form class="user" method="post" action="login/cekUser">
                                    <div class="form-group">
                                        <?php
                                        //if(session()->getFlashdata('errIdUser')){
                                        //    $isInvalidUser = 'is-invalid';
                                        //}else {
                                        //    $isInvalidUser = '';
                                        //}

                                        // atau dengan cara menggunakan ternari
                                        $isInvalidUsername = (session()->getFlashdata('errUsername')) ? 'is-invalid' : '';
                                        ?>
                                        <input type="text" class="form-control form-control-user <?= $isInvalidUsername ?>" name="username" id="username" placeholder="Inputkan Username" autofocus>

                                        <?php
                                        if (session()->getFlashdata('errUsername')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                                    ' . session()->getFlashdata('errUsername') . '
                                                  </div>';
                                        }
                                        ?>

                                    </div>


                                    <div class="form-group">
                                        <?php
                                        $isInvalidPassword = (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                                        ?>
                                        <input type="password" class="form-control form-control-user <?= $isInvalidPassword ?>" name="password" id="password" placeholder="Inputkan Password">

                                        <?php
                                        if (session()->getFlashdata('errPassword')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                                    ' . session()->getFlashdata('errPassword') . '
                                                  </div>';
                                        }
                                        ?>

                                    </div>


                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url() ?>/login/registrasi">Buat Akun Baru</a></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/sb-admin/js/sb-admin-2.min.js"></script>

</body>

</html>