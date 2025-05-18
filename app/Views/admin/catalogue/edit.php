<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/catalogue/update/' . $catalogue['id_produk']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="gambar_lama" value="<?= esc($catalogue['gambar_produk'], 'attr'); ?>">

    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk', esc($catalogue['nama_produk'])); ?>" autofocus>
        <?php if ($validation->hasError('nama_produk')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('nama_produk'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="harga_produk">Harga Produk</label>
        <input type="number" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : ''; ?>" id="harga_produk" name="harga_produk" value="<?= old('harga_produk', esc($catalogue['harga_produk'])); ?>">
        <?php if ($validation->hasError('harga_produk')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('harga_produk'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="stok_tersedia">Stok Tersedia</label>
        <input type="number" class="form-control <?= ($validation->hasError('stok_tersedia')) ? 'is-invalid' : ''; ?>" id="stok_tersedia" name="stok_tersedia" value="<?= old('stok_tersedia', esc($catalogue['stok_tersedia'])); ?>">
        <?php if ($validation->hasError('stok_tersedia')) : ?>
            <div class="invalid-feedback">
                <?= $validation->getError('stok_tersedia'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="gambar_produk">Gambar Produk (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar_produk')) ? 'is-invalid' : ''; ?>" id="gambar_produk" name="gambar_produk" onchange="previewImgCatalogue()">
         <?php if ($validation->hasError('gambar_produk')) : ?>
            <div class="invalid-feedback" style="display:block;">
                <?= $validation->getError('gambar_produk'); ?>
            </div>
        <?php endif; ?>
        <img src="<?= base_url('img/' . (empty($catalogue['gambar_produk']) ? 'default.jpg' : esc($catalogue['gambar_produk'], 'attr'))); ?>" class="img-preview img-preview-produk" alt="Preview Gambar Produk Saat Ini">
    </div>

    <button type="submit" class="btn btn-primary">Update Produk</button>
    <a href="<?= site_url('admin/catalogue'); ?>" class="btn btn-secondary">Kembali</a>
</form>

<script>
    function previewImgCatalogue() {
        const inputElement = document.getElementById('gambar_produk');
        const imgPreview = document.querySelector('.img-preview-produk');
        
        // Mengambil gambar yang sudah ada jika ada, atau default jika tidak
        const existingImage = '<?= base_url('img/' . (empty($catalogue['gambar_produk']) ? 'default.jpg' : esc($catalogue['gambar_produk'], 'attr'))); ?>';

        if (inputElement.files && inputElement.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
            reader.readAsDataURL(inputElement.files[0]);
        } else {
            // Jika tidak ada file baru dipilih, tetap tampilkan gambar yang sudah ada (atau default)
            // Ini berguna agar saat edit, jika gambar tidak diubah, preview tidak kembali ke default.jpg kosong
            // Namun, karena onchange, ini mungkin tidak selalu diperlukan kecuali jika user memilih file lalu menghapusnya
             // imgPreview.src = existingImage; // Baris ini mungkin tidak diperlukan jika logika onchange hanya saat ada file
        }
    }
    // Panggil sekali saat halaman dimuat untuk memastikan preview benar jika ada old input (misal setelah validasi gagal)
    // document.addEventListener('DOMContentLoaded', function() {
    //     if (document.getElementById('gambar_produk').files.length === 0) {
    //         document.querySelector('.img-preview-produk').src = '<?= base_url('img/' . (empty($catalogue['gambar_produk']) ? 'default.jpg' : esc($catalogue['gambar_produk'], 'attr'))); ?>';
    //     }
    // });
</script>
<?= $this->endSection(); ?>