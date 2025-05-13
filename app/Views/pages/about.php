      <!-- Template Headerr -->
      <?php $this->extend('layout/template'); ?>


      <!-- About section design -->
      <?= $this->section('content'); ?>
      <section class="about" id="about">
        <div class="team">
          <div class="main-text">
            <h2> Get to know our team </h2>
            <p> Passionate experts bringing joy to children </p>
          </div>
          <div class="team-grid">
            <div class="team-card">
              <div class="team-card-image">
                <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
              </div>
              <div class="team-card-profile">
                <h3>Jimmy</h3>
                <p class="position">Head Operation</p>
                <hr>
              <p class="description">
                  Oour founder and chief visionary, is the driving force behind Ace Hobby Town, leading the development of our products, marketing strategies, and customer experience.
              </p>
              </div>
            </div>
            <div class="team-card">
              <div class="team-card-image">
                <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
              </div>
              <div class="team-card-profile">
                <h3>Agung</h3>
                <p class="position">Shop Assistant</p>
                <hr>
              <p class="description">
                   If you are Universal Century fans, find Agung to guide you through our Gunpla Model Kits collections.
              </p>
              </div>
            </div>
            <div class="team-card">
              <div class="team-card-image">
                <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
              </div>
              <div class="team-card-profile">
                <h3>Wisnu</h3>
                <p class="position">Shop Assistant</p>
                <hr>
              <p class="description">
                  Wisnu can guide you playing Trading Card Game, and much more.
              </p>
              </div>
            </div>
            <div class="team-card">
              <div class="team-card-image">
                <img src="/img/logo_ACE.png" alt="Ace Logo" class="team-logo">
              </div>
              <div class="team-card-profile">
                <h3>Diaz</h3>
                <p class="position">Shop Assistant</p>
                <hr>
              <p class="description">
                  Find Diaz to get recommendations in Model Kits, and he is our star in our Social Media Live Broadcast!
              </div>
            </div>
          </div>
        </div>
        <div class="main-text">
          <p>About</p>
          <h2><span>All</span> About Us</h2>
        </div>
          <div class="about-container">
            <div class="about-img">
              <img src="/img/acehobbytown.jpg" alt="foto toko" />
            </div>
            <div class="about-text">
              <h2>About <span>Us</span></h2>
              <h4>The beginning of AceHobbyTown</h4>
              <hr>
              <p>
                We are a team of passionate people whose goal is to improve everyone's
                life through disruptive products. We build great products to solve
                your business problems.Our products are designed for small to medium
                size companies willing to optimize their performance.
              </p>
            </div>
            
            <div class="about-text">
              <h2>Enhance <span>Your Playtime</span></h2>
              <h4>"Do More What Makes You Happy"</h4>
              <hr>
              <p>
                Through your hobbies you can get more quality time, and feel refreshed after!
              </p>
            </div>
            <div class="about-img">
              <img src="/img/gundamevent.jpg" alt="foto toko" />
            </div>

            <div class="about-img">
              <img src="/img/imageabout1.jpg" alt="foto toko" />
            </div>
            <div class="about-text">
              <h2>Explore <span> Our </span></h2>
              <h4>Toy and Hobbies Collection</h4>
              <hr>
              <p>
                "At Ace Hobby Town, we are committed to providing the highest quality toys and hobbies items that inspire creativity, learning, and fun for children of all ages." Welcome to our toy store – where Hobby and Fun Meets!
              </p>
          </div>
      </section>
          <?php $this->endSection(); ?>