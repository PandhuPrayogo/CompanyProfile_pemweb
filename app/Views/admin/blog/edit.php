<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/blog/update/' . $blog['id_blog']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="gambar_lama" value="<?= esc($blog['gambar_blog']); ?>">

    <div class="form-group">
        <label for="judul_blog">Judul Blog</label>
        <input type="text" class="form-control <?= ($validation->hasError('judul_blog')) ? 'is-invalid' : ''; ?>" id="judul_blog" name="judul_blog" value="<?= old('judul_blog', esc($blog['judul_blog'])); ?>" autofocus>
        <?php if ($validation->hasError('judul_blog')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('judul_blog'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="deskripsi_blog">Deskripsi</label>
        <textarea class="form-control <?= ($validation->hasError('deskripsi_blog')) ? 'is-invalid' : ''; ?>" id="deskripsi_blog" name="deskripsi_blog" rows="10"><?= old('deskripsi_blog', esc($blog['deskripsi_blog'])); ?></textarea>
        <?php if ($validation->hasError('deskripsi_blog')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('deskripsi_blog'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="gambar_blog">Gambar Blog (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar_blog')) ? 'is-invalid' : ''; ?>" id="gambar_blog" name="gambar_blog" onchange="previewImg('gambar_blog', 'img-preview-blog')">
         <?php if ($validation->hasError('gambar_blog')) : ?>
            <div class="invalid-feedback" style="display:block;">
                <?= $validation->getError('gambar_blog'); ?>
            </div>
        <?php endif; ?>
        <img src="<?= base_url('img/' . (empty($blog['gambar_blog']) ? 'default.jpg' : esc($blog['gambar_blog']))); ?>" class="img-preview img-preview-blog" alt="Preview Gambar">
    </div>

    <button type="submit" class="btn btn-primary">Update Postingan</button>
    <a href="<?= site_url('admin/blog'); ?>" class="btn btn-secondary">Kembali</a>
</form>
<script> // Salin script previewImg dari create.php </script>
<?= $this->endSection(); ?>