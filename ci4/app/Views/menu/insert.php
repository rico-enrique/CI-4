<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="col">
    <?php

    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }

    ?>
</div>

<div class="col">
    <h3>Insert Data</h3>
</div>


<div class="col-8">
    <form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value) : ?>
                    <option value=<?= $value['idkategori']; ?>><?= $value['kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <input class="form-control" type="text" name="menu" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input class="form-control" type="number" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input class="form-control" type="file" name="gambar" required>
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?= $this->endSection() ?>