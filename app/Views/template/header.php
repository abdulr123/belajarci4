<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My css -->
    <link rel="stylesheet" href="/css/style.css">

    <title><?= $title; ?></title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Belajar CI4</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php if (session()->level == 2) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/halaman/aboutme">About Me</a>
                        </li>
                    <?php endif; ?>

                    <?php if (session()->level == 1) : ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="/buku/">Buku</a>
                        </li>
                    <?php endif; ?>

                </ul>

                <?php if (session()->level != '') : ?>
                    Welcome <?= session()->get('username'); ?> | <a href="<?= base_url() ?>/login/logout" class="btn"> Logout</a>
                <?php endif; ?>
                <?php if (session()->level == '') : ?>
                    <a href="<?= base_url() ?>/login" class="btn btn-secondary"> Login</a>
                <?php endif; ?>


            </div>
        </div>
    </nav>