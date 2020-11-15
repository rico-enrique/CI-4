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

<h3>Update Data</h3>

<form action="<?= base_url() ?>/admin/kategori/update" method="post">
    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= $kategori['kategori'] ?>" required>
    </div>
    <div class="form-group">
        <label for="Keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?= $kategori['keterangan'] ?>" required>
    </div>
    <div class="form-group">
        <input type="submit" name="simpan" value="Simpan">
    </div>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori'] ?>">
</form>

<?= $this->endSection() ?>