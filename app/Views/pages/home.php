      <!-- Template Headerr -->
      <?php $this->extend('layout/template'); ?>

      <!-- Section Home -->
      <?= $this->section('content'); ?>
              <section class="home">
                  <div class="home-text">
                      <h5>EXPLORE OUR</h5>
                      <h1> Toys and <br> Hobbies Collection </h1>
                      <h3> ACEHOBBYTOWN </h3>
                      <p> “Di Ace Hobby Town, kami berkomitmen untuk menyediakan mainan dan perlengkapan hobi berkualitas tinggi yang mampu menginspirasi kreativitas, pembelajaran, dan kesenangan bagi anak-anak dari segala usia.”</p>
                        
                        <p>"Selamat datang di toko mainan kami – tempat Hobi dan Kesenangan bertemu!"</p>
                        <img src="/img/logohome.png" alt="">
                  </div>
              </section>

              <!-- Section Why -->
              <section class="why" id="why">
                  <h1 class="why-heading">Mengapa Harus Memilih ACEHOBBYTOWN?</h1>

                  <div class="why-row">
                    <div class="why-image">
                      <img src="/img/acehobbytown_home1.jpg" alt="acehobbytown_home1">
                    </div>
                    <div class="why-content">
                      <h2> Mengapa harus memilih kami? </h2>
                      <p> Kami menyediakan berbagai macam mainan berkualitas untuk semua usia. Mulai dari permainan edukatif hingga boneka karakter kesayangan, semua koleksi kami dirancang untuk mengasah kreativitas dan pembelajaran anak.
                      Kami juga bangga memberikan pelayanan pelanggan yang ramah dan pengalaman belanja yang menyenangkan bagi seluruh keluarga.</p>
                      <a href="about" class="button"> Jelajahi </a>
                    </div>
                  </div>
              </section>

              <!-- Section Team -->
              <section class="team" id="team">
                <div class="team">
                <div class="main-text">
                  <h2> Kenali Tim Kami </h2>
                  <p> Tim yang penuh semangat, hadir untuk membawa kebahagiaan. </p>
                  <hr>
                </div>

                <div class="team-container">
                  <div class="team-card">
                    <div class="team-card-image">
                      <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
                    </div>
                    <div class="team-card-profile">
                      <h3>Jimmy</h3>
                      <p class="position"> Kepala Operasional </p>
                      <hr>
                    <p class="description">
                        Pendiri sekaligus pemimpin utama Ace Hobby Town yang menjadi penggerak dalam pengembangan produk, strategi pemasaran, dan pelayanan pelanggan.
                    </p>
                    </div>
                  </div>
                  <div class="team-card">
                    <div class="team-card-image">
                      <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
                    </div>
                    <div class="team-card-profile">
                      <h3>Agung</h3>
                      <p class="position">Asisten Toko</p>
                      <hr>
                    <p class="description">
                        Pecinta Universal Century? Temui Agung untuk menjelajahi koleksi Gunpla Model Kits kami!
                    </p>
                    </div>
                  </div>
                  <div class="team-card">
                    <div class="team-card-image">
                      <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
                    </div>
                    <div class="team-card-profile">
                      <h3>Wisnu</h3>
                      <p class="position">Asisten Toko</p>
                      <hr>
                    <p class="description">
                        Wisnu siap memandu Anda dalam permainan Trading Card Game dan lainnya.
                    </p>
                    </div>
                  </div>
                  <div class="team-card">
                    <div class="team-card-image">
                      <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
                    </div>
                    <div class="team-card-profile">
                      <h3>Diaz</h3>
                      <p class="position">Asisten Toko</p>
                      <hr>
                    <p class="description">
                        Butuh rekomendasi Model Kit? Diaz adalah ahlinya, sekaligus bintang siaran langsung kami di media sosial!
                    </div>
                  </div>
                </div>

              </div>
              </section>

              <section class="profile" id="profile">
                <div class="main-text">
                <p>About</p>
                <h2><span>Semua</span> Tentang Kami</h2>
                <hr>
              </div>
                <div class="about-container">
                  <div class="about-img">
                    <img src="/img/acehobbytown.jpg" alt="foto toko" />
                  </div>
                  <div class="about-text">
                    <h2>Tentang <i>Ace<span>Hobby</span>Town</i></h2>
                    <h4>Awal Mula Ace Hobby Town</h4>
                    <hr>
                    <p>
                      Kami adalah tim yang bersemangat dengan tujuan meningkatkan kualitas hidup melalui produk yang inovatif. Kami menciptakan produk yang luar biasa untuk membantu menyelesaikan kebutuhan hobi Anda.
                      Produk kami cocok untuk individu, komunitas, hingga usaha kecil dan menengah yang ingin meningkatkan kualitas waktu dan hiburan mereka.
                    </p>
                    <a href="about" class="button"> Jelajahi </a>
                  </div>
              </section>

              <!-- Section review -->
              <section class="review" id="review">
                <h1 class="review-heading"> Ulasan Pelanggan </h1>
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