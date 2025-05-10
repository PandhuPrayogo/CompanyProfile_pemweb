<!-- Template Headerr -->
<?php $this->extend('layout/template'); ?>

<!-- Blog section design -->
<?= $this->section('content'); ?>
<section class="portofolio" id="portofolio">
        <div class="main-text">
          <p>Blog</p>
          <h2><span>Latest</span> News</h2>
        </div>

        <div class="blog-content">
          <?php foreach ($blog as $news) : ?>
          <div class="row">
            <img src="/img/<?= $news['gambar_blog'];?>" alt="news1" />
            <div class="layer">
              <h5><?= $news['judul_blog'];?></h5>
              <p>
                <?= $news['deskripsi_blog'];?>
              </p>
              <p>
                posted at <?= $news['update_at'];?>
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="update-text">
        <p> Last Update at: 5/5/2025 - 8:17 AM </p>
      </div>
      </section>

      <!-- Detail Blog -->
      <div id="blog-detail" class="detail-blog">
        <div class="detail-content">
          <span class="close">&times;</span>
          <img id="detailImage" src="" alt="Blog Image" />
          <h5 id="detailTitle"></h5>
          <p id="detailDescription"></p>
        </div>
      </div>
      <?= $this->endSection(); ?>