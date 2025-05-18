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
            
            <!-- Jelajahi lebih lanjut -->
            <div class="more-info">
              <div class="container-moreInfo">
                <div class="more-text">
                  <p> Jelajahi lebih lanjut: </p>
                </div>
              <div class="more-icons">
                <a href="https://shopee.co.id/acehobbytown"><img src="/img/shopee_icon.svg" alt="Shopee Ace Hobby Town"></a>
                <a href="https://www.tokopedia.com/acehobbytown"><img src="/img/tokopedia_icon.svg" alt="Tokopedia Ace Hobby Town"></a>
              </div>
            </div>
          </section>
          <?= $this->endSection(); ?>