<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/catalogue/save'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk'); ?>" autofocus>
        <?php if ($validation->hasError('nama_produk')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('nama_produk'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="harga_produk">Harga Produk </label>
        <input type="number" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : ''; ?>" id="harga_produk" name="harga_produk" value="<?= old('harga_produk'); ?>" placeholder="Contoh: 150000">
        <?php if ($validation->hasError('harga_produk')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('harga_produk'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="stok_tersedia">Stok Tersedia</label>
        <input type="number" class="form-control <?= ($validation->hasError('stok_tersedia')) ? 'is-invalid' : ''; ?>" id="stok_tersedia" name="stok_tersedia" value="<?= old('stok_tersedia'); ?>">
        <?php if ($validation->hasError('stok_tersedia')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('stok_tersedia'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="gambar_produk">Gambar Produk</label>
        <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar_produk')) ? 'is-invalid' : ''; ?>" id="gambar_produk" name="gambar_produk" onchange="previewImgCatalogue()">
        <?php if ($validation->hasError('gambar_produk')) : ?>
            <div class="invalid-feedback" style="display:block;">
                <?= $validation->getError('gambar_produk'); ?>
            </div>
        <?php endif; ?>
        <img src="<?= base_url('img/default.jpg'); ?>" class="img-preview img-preview-produk" alt="Preview Gambar Produk">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Produk</button>
    <a href="<?= site_url('admin/catalogue'); ?>" class="btn btn-secondary">Kembali</a>
</form>

<script>
    function previewImgCatalogue() {
        const inputElement = document.getElementById('gambar_produk');
        const imgPreview = document.querySelector('.img-preview-produk');
        
        const defaultImg = '<?= base_url('img/default.jpg'); ?>';

        if (inputElement.files && inputElement.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(inputElement.files[0]);
        } else {
            imgPreview.src = defaultImg;
        }
    }
</script>
<?= $this->endSection(); ?>