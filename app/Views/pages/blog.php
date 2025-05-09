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
          <div class="row">
            <img src="/img/news1.png" alt="news1" />
            <div class="layer">
              <h5>Gundam GQuuuuuuX</h5>
              <p>
                Its first few episodes were initially shown in Japanese theaters
                on 2025-01-17
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/thegundambase.jpg" alt="news1" />
            <div class="layer">
              <h5>
                CROSS CONTRAST COLORS Edition MG Gundam Epyon EW and Wing Gundam
                Zero EW
              </h5>
              <p>
                The MG Gundam Epyon EW [CROSS CONTRAST COLORS/CLEAR WHITE] and MG
                Wing Gundam Zero EW [CROSS CONTRAST COLORS/CLEAR PURPLE] will be
                released at all THE GUNDAM BASE stores (general GUNPLA facilities)
                on Saturday, April 26th.
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/gundamturna.jpg" alt="news1" />
            <div class="layer">
              <h5>
                HGCC 1/144 EXPANSION EFFECT UNIT “MOONLIGHT BUTTERFLY” for ∀
                GUNDAM
              </h5>
              <p>RELEASE DATE: Aug. 2025</p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>
          <div class="row">
            <img src="/img/news1.png" alt="news1" />
            <div class="layer">
              <h5>Gundam GQuuuuuuX</h5>
              <p>
                Its first few episodes were initially shown in Japanese theaters
                on 2025-01-17
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/thegundambase.jpg" alt="news1" />
            <div class="layer">
              <h5>
                CROSS CONTRAST COLORS Edition MG Gundam Epyon EW and Wing Gundam
                Zero EW
              </h5>
              <p>
                The MG Gundam Epyon EW [CROSS CONTRAST COLORS/CLEAR WHITE] and MG
                Wing Gundam Zero EW [CROSS CONTRAST COLORS/CLEAR PURPLE] will be
                released at all THE GUNDAM BASE stores (general GUNPLA facilities)
                on Saturday, April 26th.
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/gundamturna.jpg" alt="news1" />
            <div class="layer">
              <h5>
                HGCC 1/144 EXPANSION EFFECT UNIT “MOONLIGHT BUTTERFLY” for ∀
                GUNDAM
              </h5>
              <p>RELEASE DATE: Aug. 2025</p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/top.jpg" alt="news1" />
            <div class="layer">
              <h5>
                The Repainted Alpha Omega Series Gundam W Heero Yuy & Relena
                Peacecraft
              </h5>
              <p>
                The Alpha Omega Series Mobile Suit Gundam W Heero Yuy & Relena
                Peacecraft Set 30th Anniversary Repaint Re-Release will be sold in
                late October
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/gundamwing30th.jpg" alt="news1" />
            <div class="layer">
              <h5>Mobile Suit Gundam Wing 30th Anniversary Project Begins!</h5>
              <p>
                Its first few episodes were initially shown in Japanese theaters
                on 2025-01-17
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>

          <div class="row">
            <img src="/img/secretlab.jpg" alt="news1" />
            <div class="layer">
              <h5>The Secretlab Mobile Suit Gundam Collection</h5>
              <p>
                Secretlab Mobile Suit Gundam Collection is a collaboration between
                gaming chair brand Secretlab and the Mobile Suit Gundam series
              </p>
              <a href="#"><i class="ri-article-line"></i></a>
            </div>
          </div>
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