      <!-- Template Headerr -->
      <?php $this->extend('layout/template'); ?>


      <!-- About section design -->
      <?= $this->section('content'); ?>
      <section class="about" id="about">

        <div class="team">
          <div class="main-text">
            <h2> Kenali Tim Kami </h2>
            <p> Tim yang penuh semangat, hadir untuk membawa kebahagiaan. </p>
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

        <div class="main-text">
          <p>About</p>
          <h2><span>Semua</span> Tentang Kami</h2>
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
            </div>
            
            <div class="about-text">
              <h2>Tingkatkan Waktu <span>Bermain Anda</span></h2>
              <h4>"Lakukan Hal yang Membuatmu Bahagia!"</h4>
              <hr>
              <p>
                Lewat hobi, Anda bisa mendapatkan waktu berkualitas dan menyegarkan kembali semangat Anda.
              </p>
            </div>
            <div class="about-img">
              <img src="/img/gundamevent.jpg" alt="foto toko" />
            </div>

            <div class="about-img">
              <img src="/img/imageabout1.jpg" alt="foto toko" />
            </div>
            <div class="about-text">
              <h2><span> Jelajahi </span></h2>
              <h4>Koleksi Mainan dan Hobi</h4>
              <hr>
              <p>
                Kami berkomitmen untuk menghadirkan produk-produk terbaik yang mendorong kreativitas, pembelajaran, dan kebahagiaan bagi semua kalangan.
              </p>
          </div>
      </section>
          <?php $this->endSection(); ?>