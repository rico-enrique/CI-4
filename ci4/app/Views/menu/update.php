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
    <form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value) : ?>
                    <option <?php if ($value['idkategori'] == $menu['idkategori']) echo "Selected" ?> value=<?= $value['idkategori']; ?>><?= $value['kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="menu">Menu</label>
            <input class="form-control" value="<?= $menu['menu'] ?>" type="text" name="menu" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input class="form-control" value="<?= $menu['harga'] ?>" type="number" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input class="form-control" type="file" name="gambar">
        </div>
        <input type="hidden" name="gambar" value="<?= $menu['gambar'] ?>" required class="form-control">
        <input type="hidden" name="idmenu" value="<?= $menu['idmenu'] ?>" required class="form-control">
        <div class="form-group">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?= $this->endSection() ?>