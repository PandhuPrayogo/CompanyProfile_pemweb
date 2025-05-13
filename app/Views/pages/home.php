<!-- Template Headerr -->
<?php $this->extend('layout/template'); ?>

<!-- Section Home -->
<?= $this->section('content'); ?>
        <section class="home">
            <div class="home-text">
                <h5> Explore Our<h5>
                <h1> Toys and <br> Hobbies Collection </h1>
                <h3> ACEHOBBYTOWN </h3>
                <p> "At Ace Hobby Town, we are committed to providing the highest quality toys and hobbies items that inspire 
                  creativity, learning, and fun for children of all ages.
                  
                  "Welcome to our toy store – where Hobby and Fun Meets!"</p>
                  <img src="/img/logohome.png" alt="">
            </div>
        </section>

        <!-- Section Why -->
        <section class="why" id="why">
            <h1 class="why-heading">Why You Must Choose ACEHOBBYTOWN?</h1>

            <div class="why-row">
              <div class="why-image">
                <img src="/img/imagehome1.jpg" alt="">
              </div>
              <div class="why-content">
                <h2> Why Choose us? </h2>
                <p> At our toy store, we offer a wide range of high-quality toys for children of all ages. From educational games to plush companions, our selection is designed to inspire creativity and learning. We pride ourselves on providing exceptional customer service and a fun shopping experience for families.</p>
                <a href="/pages/about" class="button">Learn More</a>
              </div>
            </div>
        </section>

        <!-- Section review -->
        <section class="review" id="review">
          <h1 class="review-heading"> Customer's Review </h1>
          <div class="review-container">
            <?php foreach ($review as $rev) : ?>
            <div class="review-box">
              <div class="review-stars">
              <?php for ($i = 0; $i < $rev['jumlah_rating']; $i++) : ?>
                <i class="ri-star-fill"></i>
              <?php endfor; ?>
              </div>
              <p><?= $rev['teks_review'];?></p>
              <div class="review-user">
                  <img src="/img/<?= $rev['profile_pelanggan'];?>" alt="">
                  <div class="review-user-info">
                    <h3><?= $rev['nama_pelanggan'];?></h3>
                    <span><?= $rev['sebutan_pelanggan'];?></span>
                  </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </section>
        <?= $this->endSection(); ?>