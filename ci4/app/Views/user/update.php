<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="col">
    <?php

    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . " => " . $value;
            echo "</br>";
        }

        echo '</div>';
    }

    ?>
</div>

<div class="col">
    <h3><?= $judul; ?></h3>
</div>


<div class="col-8">
    <form action="<?= base_url('/admin/user/ubah') ?>" method="post">
        <div class="form-group">
            <input class="form-control" value="<?= $user['iduser']; ?>" type="hidden" name="iduser" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" value="<?= $user['email']; ?>" type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="level">level</label>
            <select class="form-control" name="level" id="level">
                <?php foreach ($level as $key) : ?>
                    <option <?php if ($user['level'] == $key) echo 'selected'; ?> value=<?= $key; ?>><?= $key; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>