      <!DOCTYPE html>
      <html>
        <head>
          <title><?= $title;?></title>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />

          <!-- Style CSS -->
          <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">


          <!-- Remixicon -->
          <link rel="stylesheet" href="/css/remixicon.css" />
        </head>
        <body>
        
        <!-- Header Template -->
        <header>
              <a href="#" class="logo"> ACEHOBBYTOWN </a>

                <ul class="navbar">
                  <li><a href="<?= base_url('home') ;?>" class="nav-link"> Home </a></li>
                  <li><a href="<?= base_url('about') ;?>" class="nav-link"> About </a></li>
                  <li><a href="<?= base_url('catalogue') ;?>" class="nav-link"> Catalogue </a></li>
                  <li><a href="<?= base_url('blog') ;?>" class="nav-link"> Blog </a></li>
                  <li><a href="<?= base_url('faq') ;?>" class="nav-link"> FAQ </a></li>
                </ul>

              <div class="h-right">
                <a href="<?= base_url('/pages/admin') ;?>">Login</a>
                <a href="https://www.youtube.com/@gunplatown1240"><i class="ri-youtube-fill"></i></a>
                <a href="https://www.instagram.com/acehobbytown/"><i class="ri-instagram-line"></i></a>
                <a href="https://web.facebook.com/gunto.adm"><i class="ri-facebook-fill"></i></a>
                <div class="menu-toggle">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
            </header>


          <!-- Content Section -->
          <?= $this->renderSection('content'); ?>

          <!-- Footer Template -->
            <section class="contact" id="contact">
            <div class="contact-text">
              <h2>Hubungi <span>Kami!</span></h2>
              <h4>Ingin melihat lebih banyak produk kami?</h4>
              <p>
                Selamat datang di Ace Hobby Town – ajak anak Anda mengasah keterampilannya dengan sesi rakit model kit GRATIS dari kami!
              </p>

              <div class="list">
                <li><a href="#">Hubungi Kami: </a></li>
                <li><a href="https://wa.me/6287864818158"><i class="ri-phone-line"></i> +62 8786 4818 158</a></li>
                <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=adminAcehobbytown@gmail.com"><i class="ri-mail-line"></i> adminAcehobbytown@gmail.com</a></li>
                <li><a href="https://maps.app.goo.gl/8JUZgdAJoc1mrYCY6"><i class="ri-map-pin-line"></i> Ruko Oro-oro Dowo, Jl. Brigjend Slamet Riadi No.144 B, Samaan, Klojen, Malang City, East Java 65119</a></li>
              </div>

              <div class="contact-icons">
                <a href="#"><i class="ri-youtube-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-facebook-fill"></i></a>
              </div>
            </div>

            <div class="h-right">
              <a href="https://www.youtube.com/@gunplatown1240"><i class="ri-youtube-fill"></i></a>
              <a href="https://www.instagram.com/acehobbytown/"><i class="ri-instagram-line"></i></a>
              <a href="https://web.facebook.com/gunto.adm"><i class="ri-facebook-fill"></i></a>
              <div class="menu-toggle"><i class="ri-menu-line"></i></div>
            <div class="contact-form">
              <form action="" method="post">
                <div>
                  <input type="name" placeholder="Masukkan nama" />
                </div>
                <div>
                  <input type="email" placeholder="Masukkan email" required />
                </div>
                
                <div>
                  <input type="tel" name="hp" placeholder="Masukkan nomor telepon" required />
                </div>

                <textarea
                  name=""
                  id=""
                  cols="35"
                  rows="10"
                  placeholder="Masukkan pesan"
                  required
                ></textarea>
                <input type="submit" value="Kirim pesan" class="submit" required />
              </form>
            </div>
          </section>

          <!--End Section Design -->
          <section class="copyright">
            <div class="last-text">
              <p>Copyright © AceHobbyTown All Rights Reserved.</p>
            </div>
          </section>

          <!-- Script Custom -->
          <script src="<?=base_url('/js/main.js');?>"></script>
        </body>
      </html>