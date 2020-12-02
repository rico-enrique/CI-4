<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">

    <title>Front End</title>
</head>

<body>

    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= base_url('/') ?>">Restoran-CI4</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <?php if (!empty(session()->get('pelanggan'))) {
                            $pelanggan = session()->get('pelanggan');
                        } ?>
                        <ul class="navbar-nav">
                            <li class="nav-item mt-2 ml-4">
                                <p class="mt-1">
                                    <?php if (!empty(session()->get('pelanggan'))) {
                                        echo "Halo! " . session()->get('pelanggan');
                                    }
                                    ?><span class="sr-only">(current)</span>
                                </p>
                            </li>
                            <?php if (isset($pelanggan)) : ?>
                                <li class="nav-item mt-3 ml-4">
                                    <a class="mt-1" href="<?= base_url('history-pesan') ?>">History</a>
                                </li>
                                <li class="nav-item mt-3 ml-4">
                                    <a class="mt-1" href="<?= base_url('keranjang') ?>">Keranjang</a>
                                </li>
                                <li class="nav-item mt-1 ml-4">
                                    <a class="btn btn-danger mt-1" href="<?= base_url('login/logout') ?>">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item mt-1 ml-4">
                                    <a class="btn btn-primary" href="<?= base_url('login') ?>">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>