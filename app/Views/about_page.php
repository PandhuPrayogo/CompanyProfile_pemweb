<!DOCTYPE html>
<html>
<head>
    <title>ACEHOBBYTOWN</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('app/Views/css/styles.css') ?>" />

    <!-- Remixicon -->
    <link rel="stylesheet" href="<?= base_url('app/Views/css/remixicon.css') ?>" />
</head>
<body>
    <!-- Header Template -->
    <header>
        <a href="#" class="logo">ACE<span>HOBBY</span>TOWN</a>

        <ul class="navbar">
            <li><a href="<?= base_url() ?>"> Home </a></li>
            <li><a href="<?= base_url('about') ?>"> About </a></li>
            <li><a href="<?= base_url('catalogue') ?>"> Catalogue </a></li>
            <li><a href="<?= base_url('blog') ?>"> Blog </a></li>
        </ul>

        <div class="h-right">
            <a href="#">Follow Us</a>
            <a href="https://www.youtube.com/@gunplatown1240"><i class="ri-youtube-fill"></i></a>
            <a href="https://www.instagram.com/acehobbytown/"><i class="ri-instagram-line"></i></a>
            <a href="https://web.facebook.com/gunto.adm"><i class="ri-facebook-fill"></i></a>
            <div id="menu-icon"><i class="ri-menu-line"></i></div>
        </div>
    </header>

    <!-- About section design -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="<?= base_url('public/img/acehobbytown.webp') ?>" alt="foto toko" />
        </div>

        <div class="about-text">
            <h2>About <span>Us</span></h2>
            <h4>Your adventure begins here</h4>
            <p>
                We are a team of passionate people whose goal is to improve everyone's
                life through disruptive products. We build great products to solve
                your business problems. Our products are designed for small to medium
                size companies willing to optimize their performance.
            </p>
            <a href="#" class="button">More About</a>
        </div>
    </section>

    <!-- Section Footer -->
    <section class="contact" id="contact">
        <div class="contact-text">
            <h2>Contact <span>Us!</span></h2>
            <h4>If you want to see more our product.</h4>
            <p>
                Welcome to Ace Hobby Town – get your kids to enhance their skill with
                our FREE model kit building session!
            </p>

            <div class="list">
                <li><a href="#">+62 8786 4818 158</a></li>
                <li><a href="#">adminAcehobbytown@gmail.com</a></li>
                <li><a href="#">Contact Us</a></li>
            </div>

            <div class="contact-icons">
                <a href="#"><i class="ri-youtube-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-facebook-fill"></i></a>
            </div>
        </div>

        <div class="contact-form">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('contact/submit') ?>" method="post">
                <?= csrf_field() ?>
                
                <input type="text" name="name" placeholder="Your Name" value="<?= old('name') ?>" required />
                <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['name'])): ?>
                    <small class="text-danger"><?= session()->getFlashdata('errors')['name'] ?></small>
                <?php endif; ?>
                
                <input type="email" name="email" placeholder="Your Email Address" value="<?= old('email') ?>" required />
                <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['email'])): ?>
                    <small class="text-danger"><?= session()->getFlashdata('errors')['email'] ?></small>
                <?php endif; ?>
                
                <input type="text" name="phone" placeholder="Your Mobile Number" value="<?= old('phone') ?>" required />
                <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['phone'])): ?>
                    <small class="text-danger"><?= session()->getFlashdata('errors')['phone'] ?></small>
                <?php endif; ?>
                
                <textarea name="message" cols="35" rows="10" placeholder="Text your message" required><?= old('message') ?></textarea>
                <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['message'])): ?>
                    <small class="text-danger"><?= session()->getFlashdata('errors')['message'] ?></small>
                <?php endif; ?>
                
                <input type="submit" value="Send Message" class="submit" />
            </form>
        </div>
    </section>

    <!--End Section Design -->
    <section class="end">
        <div class="last-text">
            <p>Copyright © <?= date('Y') ?> by AceHobbyTown All Rights Reserved.</p>
        </div>
    </section>

    <!-- Script Custom -->
    <script src="<?= base_url('app/Views/js/main.js') ?>"></script>
</body>
</html>