<!-- Template Headerr -->
<?php $this->extend('layout/template'); ?>

<!-- FAQ Section -->
<?= $this->section('content'); ?>
<section class="faq" id="faq">
    <div class="main-text">
        <p>FAQ</p>
        <h2><span>Frequently</span> Asked Questions</h2>
    </div>
<div class="faq-content">
<div class="faq-box">
    <div class="faq-icons">
    <i class="ri-wallet-3-fill"></i>
    </div>
    <h3>Kapan jam operasional toko dan bagaimana proses pemesanan?</h3>
    <p> Toko kami buka dari Senin hingga Sabtu, pukul 09:00 hingga 17:00. Pesanan yang masuk sebelum pukul 15:00 akan diproses dan diupayakan dikirim ke ekspedisi pada hari yang sama. </p>
</div>
<div class="faq-box">
    <div class="faq-icons">
    <i class="ri-red-packet-fill"></i>
    </div>
    <h3> Bagaimana prosedur pengiriman untuk layanan ekspres? </h3>
    <p> Untuk pengiriman ekspres seperti JNE YES atau TIKI ONS, harap lakukan pemesanan sebelum pukul 11:00. Layanan ekspres hanya dilayani oleh ekspedisi sebelum pukul 13:00 setiap harinya. </p>
</div>
<div class="faq-box">
    <div class="faq-icons">
    <i class="ri-send-plane-fill"></i>
    </div>
    <h3> Apakah ada jaminan untuk barang yang rusak atau hilang saat pengiriman? </h3>
    <p> Kami tidak bertanggung jawab atas kerusakan atau kehilangan barang selama pengiriman oleh ekspedisi. Untuk keamanan, disarankan menggunakan packing kayu dan asuransi yang dapat diminta sebelum pengiriman. </p>
</div>
</div>
</section>
<?= $this->endSection(); ?>