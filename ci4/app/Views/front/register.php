<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">

    <title>Login Page</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto">
                <div class="col">
                    <?php

                    if (!empty($info)) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $info;
                        echo '</div>';
                    }

                    ?>
                </div>
                <span>
                    <h1>Registrasi Pelanggan</h1>
                </span>
                <hr>
                <form action="<?= base_url('login/input'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input class="form-control" type="number" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="aktif" value="1" required>
                        <input class="btn btn-primary" type="submit" name="daftar" value="Daftar">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>