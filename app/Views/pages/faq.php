<!-- Template Headerr -->
<?php $this->extend('layout/template'); ?>

<!-- FAQ Section -->
<?= $this->section('content'); ?>
<section class="faq" id="faq">
    <div class="main-text">
        <p>FAQ</p>
        <h2><span>Pertanyaan</span> yang Sering Diajukan</h2>
    </div>
<div class="faq-content">
<?php foreach ($faq as $question) : ?>
<div class="faq-box">
    <div class="faq-icons">
    <i class="<?=$question['icon'];?>"></i>
    </div>
    <h3><?=$question['question'];?></h3>
    <p> <?=$question['answer'];?> </p>
</div>
<?php endforeach; ?>
</div>
</section>
<?= $this->endSection(); ?>