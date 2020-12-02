        <div class="row mt-2">
            <div class="col-3 mt-3">
                <div style="width: 15rem;">
                    <h3>Kategori</h3>
                    <ul class="card list-group list-group-flush">
                        <?php foreach ($kategori as $value) : ?>
                            <li class="list-group-item"><a href="<?= base_url('/home/kategori/' . $value['idkategori']) ?>"><?= $value['kategori']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-9 px-2 mt-3">
                <h3>Menu</h3>
                <?php foreach ($menu as $value) :  ?>
                    <div class="card" style="width: 14rem; float:left; margin: 10px;">
                        <img style="height:150px;" src="<?= base_url('upload/' . $value['gambar']) ?>" class="card-img-top" alt="<?= $value['gambar']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['menu']; ?></h5>
                            <p class="card-text"><?= $value['harga']; ?></p>
                            <a href="<?= base_url('tambah-keranjang/' . $value['idmenu']) ?>" class="btn btn-primary">Pesan!</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?= $this->renderSection('content'); ?>

                <div style="clear:both;">
                    <?= $pager->links('page', 'bootstrap') ?>
                </div>
            </div>

        </div>


        </body>

        </html>