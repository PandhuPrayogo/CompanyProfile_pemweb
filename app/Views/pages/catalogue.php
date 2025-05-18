      <!-- Template Headerr -->
      <?php $this->extend('layout/template'); ?>

      <!-- Catalogue Section -->
      <?= $this->section('content'); ?>
      <section class="product-content">
            <div class="main-text">
              <p>Catalogue</p>
              <h2><span>List</span> Items</h2>
            </div>

            <div class="new-product">
              <?php foreach ($catalogue as $item) : ?>
              <div class="row-product">
              <img src="/img/<?= $item['gambar_produk'];?>" alt="Deskripsi Gambar">
                <h4><?= $item['nama_produk'];?></h4>
                <h5> Rp. <?= $item['harga_produk'];?></h5>
                <h5> Stock: <?= $item['stok_tersedia'];?></h5>
              </div>
              <?php endforeach; ?>
            </div>

            <div class="FindMore">
              <p> Find More: </p>
              <div class="FindMore-Icon">
                <a href="https://shopee.co.id/acehobbytown"><img src="/img/shopee_icon.svg" alt="shopee acehobbytown"></a>
                <a href="https://www.instagram.com/acehobbytown/"><img src="/img/tokopedia_icon.svg" alt="tokopedia acehobbytown" width="55px"></a>
                <a href="https://web.facebook.com/gunto.adm"><i class="ri-facebook-fill"></i></a>
              </div>
            </div>
          </section>
          <?= $this->endSection(); ?>