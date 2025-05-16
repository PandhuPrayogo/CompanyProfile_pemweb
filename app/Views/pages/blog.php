    <!-- Template Headerr -->
    <?php $this->extend('layout/template'); ?>

    <!-- Blog section design -->
    <?= $this->section('content'); ?>
    <section class="portofolio" id="portofolio">
            <div class="main-text">
              <p>Blog</p>
              <h2><span>Berita</span> Terbaru</h2>
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
                  <a href="#"><i class="ri-article-line"></i></a>
                </div>
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
                <a href="https://www.youtube.com/@gunplatown1240" aria-label="YouTube Ace Hobby Town">
                  <i class="ri-youtube-fill"></i>
                </a>
                <a href="https://www.instagram.com/acehobbytown/" aria-label="Instagram Ace Hobby Town">
                  <i class="ri-instagram-line"></i>
                </a>
                <a href="https://web.facebook.com/gunto.adm" aria-label="Facebook Ace Hobby Town">
                  <i class="ri-facebook-fill"></i>
                </a>
            </div>
            </div>
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