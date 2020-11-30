<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h1><?= $judul; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php

        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('info');
            echo '</div>';
        }

        ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order[0]['pelanggan']; ?></p>
    </div>
    <div class="col">
        <p>Tanggal : <?= date("d-m-Y", strtotime($order[0]['tglorder'])); ?></p>
    </div>
    <div class="col">
        <p>Total : <b><?= number_format($order[0]['total']); ?></b></p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Rincian Order</h2>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <form action="<?= base_url('/admin/order/update') ?>" method="post">
            <div class="form-group">
                <label for="Kategori">BAYAR!</label>
                <input class="form-control" type="number" name="bayar" required>
            </div>

            <input class="form-control" type="hidden" name="total" value="<?= $order[0]['total'] ?>" required>
            <input class="form-control" type="hidden" name="idorder" value="<?= $order[0]['idorder'] ?>" required>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="simpan" value="BAYAR!">
            </div>
        </form>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($detail as $value) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['menu']; ?></td>
                <td><?= $value['hargajual']; ?></td>
                <td><?= $value['jumlah']; ?></td>
                <td><?= $value['jumlah'] * $value['hargajual']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>

<?= $this->endSection() ?>