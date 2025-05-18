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
            <a href="#" class="logo">ACEHOBBYTOWN</a>

            <div class="navbar">
              <ul>
                <li><a href="<?= base_url('/') ;?>"> Home </a></li>
                <li><a href="<?= base_url('/pages/about') ;?>"> About </a></li>
                <li><a href="<?= base_url('/pages/catalogue') ;?>"> Catalogue </a></li>
                <li><a href="<?= base_url('/pages/blog') ;?>"> Blog </a></li>
                <li><a href="<?= base_url('/pages/faq') ;?>"> FAQ </a></li>
              </ul>
            </div>

            <div class="h-right">
              <a href="https://www.youtube.com/@gunplatown1240"><i class="ri-youtube-fill"></i></a>
              <a href="https://www.instagram.com/acehobbytown/"><i class="ri-instagram-line"></i></a>
              <a href="https://web.facebook.com/gunto.adm"><i class="ri-facebook-fill"></i></a>
              <div class="menu-toggle"><i class="ri-menu-line"></i></div>
            </div>
          </header>


        <!-- Content Section -->
        <?= $this->renderSection('content'); ?>

        <!-- Footer Template -->
          <section class="contact" id="contact">
          <div class="contact-text">
            <h2>Contact <span>Us!</span></h2>
            <h4>If you want to see more our product.</h4>
            <p>
              Welcome to Ace Hobby Town – get your kids to enhance their skill with
              our FREE model kit building session!
            </p>

            <div class="list">
              <li><a href="#">Contact Us</a></li>
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

          <div class="contact-form">
            <form action="">
              <input type="name" placeholder="Your Name" required />
              <input type="email" placeholder="Your Email Address" required />
              <input type="number" placeholder="Your Mobile Number" required />
              <textarea
                name=""
                id=""
                cols="35"
                rows="10"
                placeholder="Text your message"
                required
              ></textarea>
              <input type="submit" value="Send Message" class="submit" required />
            </form>
          </div>
        </section>

        <!--End Section Design -->
        <section class="end">
          <div class="last-text">
            <p>Copyright © AceHobbyTown All Rights Reserved.</p>
          </div>
        </section>

        <!-- Script Custom -->
        <script src="<?=base_url('/js/main.js');?>"></script>
      </body>
    </html>