<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/faq/update/' . $faq['id_faq']); ?>" method="post">
    <?= csrf_field(); ?>
    <?php $errors = session()->getFlashdata('errors'); ?>

    <div class="form-group">
        <label for="pertanyaan">Pertanyaan</label>
        <textarea class="form-control <?= isset($errors['pertanyaan']) ? 'is-invalid' : ''; ?>" id="pertanyaan" name="pertanyaan" rows="3" autofocus><?= old('pertanyaan', esc($faq['pertanyaan'])); ?></textarea>
        <?php if (isset($errors['pertanyaan'])) : ?><div class="invalid-feedback"><?= esc($errors['pertanyaan']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="jawaban">Jawaban</label>
        <textarea class="form-control <?= isset($errors['jawaban']) ? 'is-invalid' : ''; ?>" id="jawaban" name="jawaban" rows="6"><?= old('jawaban', esc($faq['jawaban'])); ?></textarea>
        <?php if (isset($errors['jawaban'])) : ?><div class="invalid-feedback"><?= esc($errors['jawaban']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori (Opsional)</label>
        <input type="text" class="form-control <?= isset($errors['kategori']) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= old('kategori', esc($faq['kategori'])); ?>">
        <?php if (isset($errors['kategori'])) : ?><div class="invalid-feedback"><?= esc($errors['kategori']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="urutan">Urutan Tampil (Opsional, angka, kecil duluan)</label>
        <input type="number" class="form-control <?= isset($errors['urutan']) ? 'is-invalid' : ''; ?>" id="urutan" name="urutan" value="<?= old('urutan', esc($faq['urutan'])); ?>">
        <?php if (isset($errors['urutan'])) : ?><div class="invalid-feedback"><?= esc($errors['urutan']); ?></div><?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update FAQ</button>
    <a href="<?= site_url('admin/faq'); ?>" class="btn btn-secondary">Kembali</a>
</form>
<?= $this->endSection(); ?>