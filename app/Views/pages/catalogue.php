<!-- Template Headerr -->
<?php $this->extend('layout/template'); ?>

<!-- Catalogue Section -->
<?= $this->section('content'); ?>
<section class="product-content">
      <div class="main-text">
        <p>Catalogue</p>
        <h2><span>New Arrival</span> Items</h2>
      </div>

      <div class="new-product">
        <?php foreach ($catalogue as $item) : ?>
        <div class="row-product">
        <img src="/img/<?= $item['gambar_produk'];?>" alt="Deskripsi Gambar">
          <h4><?= $item['nama_produk'];?></h4>
          <h5> Price: <?= $item['harga_produk'];?></h5>
          <h5> Stock: <?= $item['stok_tersedia'];?></h5>
          <div class="hot-badge">Hot Item</div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="update-text">
        <p> Last Update at: </p>
      </div>
    </section>
    <?= $this->endSection(); ?>