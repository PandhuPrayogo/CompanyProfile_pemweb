<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/review/save'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <?php
    // Ambil semua error validasi jika ada (setelah redirect withInput)
    // $validation ada secara otomatis jika dikirim dari controller,
    // atau bisa juga dari session()->getFlashdata('errors') jika Anda redirect dengan ->with('errors', $this->validator->getErrors())
    $validation = \Config\Services::validation();
    if (session()->getFlashdata('errors')) {
        // Jika ada errors dari flashdata (setelah redirect with('errors', ...)), gunakan itu
        // Ini berguna jika Anda menggunakan ->with('errors', $this->validator->getErrors()) di controller
        $errors = session()->getFlashdata('errors');
    } else {
        // Jika tidak, coba dapatkan dari service validasi (misalnya jika halaman dimuat pertama kali setelah validasi gagal tanpa redirect spesifik)
        // Namun, cara paling umum adalah mengirimkan $validation dari controller atau menggunakan flashdata.
        // Untuk kasus ini, kita asumsikan error akan ada di flashdata 'errors' jika redirect dengan ->with('errors', ...)
        $errors = []; // default kosong jika tidak ada
    }
    ?>

    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control <?= isset($errors['nama_pelanggan']) ? 'is-invalid' : ''; ?>" id="nama_pelanggan" name="nama_pelanggan" value="<?= old('nama_pelanggan'); ?>" autofocus>
        <?php if (isset($errors['nama_pelanggan'])) : ?><div class="invalid-feedback"><?= esc($errors['nama_pelanggan']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="sebutan_pelanggan">Sebutan Pelanggan (Contoh: Member Setia, Kolektor Gundam)</label>
        <input type="text" class="form-control <?= isset($errors['sebutan_pelanggan']) ? 'is-invalid' : ''; ?>" id="sebutan_pelanggan" name="sebutan_pelanggan" value="<?= old('sebutan_pelanggan'); ?>">
        <?php if (isset($errors['sebutan_pelanggan'])) : ?><div class="invalid-feedback"><?= esc($errors['sebutan_pelanggan']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="teks_review">Teks Review</label>
        <textarea class="form-control <?= isset($errors['teks_review']) ? 'is-invalid' : ''; ?>" id="teks_review" name="teks_review" rows="5"><?= old('teks_review'); ?></textarea>
        <?php if (isset($errors['teks_review'])) : ?><div class="invalid-feedback"><?= esc($errors['teks_review']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="jumlah_rating">Jumlah Rating (1-5)</label>
        <input type="number" class="form-control <?= isset($errors['jumlah_rating']) ? 'is-invalid' : ''; ?>" id="jumlah_rating" name="jumlah_rating" value="<?= old('jumlah_rating', 5); ?>" min="1" max="5">
        <?php if (isset($errors['jumlah_rating'])) : ?><div class="invalid-feedback"><?= esc($errors['jumlah_rating']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control <?= isset($errors['status']) ? 'is-invalid' : ''; ?>">
            <option value="approved" <?= old('status', 'approved') == 'approved' ? 'selected' : ''; ?>>Approved</option>
            <option value="pending" <?= old('status') == 'pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="rejected" <?= old('status') == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
        </select>
        <?php if (isset($errors['status'])) : ?><div class="invalid-feedback"><?= esc($errors['status']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="profile_pelanggan">Foto Profil Pelanggan (Opsional, Maks 2MB)</label>
        <input type="file" class="form-control-file <?= isset($errors['profile_pelanggan']) ? 'is-invalid' : ''; ?>" id="profile_pelanggan" name="profile_pelanggan" onchange="previewGeneral('profile_pelanggan', 'img-preview-review')">
        <?php if (isset($errors['profile_pelanggan'])) : ?>
            <div class="invalid-feedback" style="display:block;"><?= esc($errors['profile_pelanggan']); ?></div>
        <?php endif; ?>
        <img src="<?= base_url('img/default_profile.jpg'); ?>" class="img-preview img-preview-review" alt="Preview Foto Profil" style="margin-top: 10px; border-radius: 4px; max-width: 150px; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Review</button>
    <a href="<?= site_url('admin/review'); ?>" class="btn btn-secondary">Kembali</a>
</form>

<?php
// Pastikan fungsi previewGeneral sudah ada di template_admin.php atau definisikan di sini jika belum
// Jika sudah ada di template_admin.php, bagian script ini tidak perlu lagi.
// Namun, untuk memastikan "salin-tempel" berfungsi jika belum ada, bisa ditambahkan di sini.
// Tapi idealnya, fungsi JS global ada di satu tempat (misal template_admin.php atau file JS terpisah).

/* Jika fungsi previewGeneral BELUM ADA di template_admin.php, Anda bisa tambahkan script ini di sini:
<script>
    function previewGeneral(inputId, previewClass) {
        const inputElement = document.getElementById(inputId);
        const imgPreview = document.querySelector('.' + previewClass);
        const defaultImg = '<?= base_url('img/default_profile.jpg'); ?>'; // Sesuaikan default image

        if (inputElement && imgPreview) {
            if (inputElement.files && inputElement.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
                reader.readAsDataURL(inputElement.files[0]);
            } else {
                // Jika belum ada gambar yang dipilih dan ada gambar lama (untuk edit), jangan ubah
                // Jika ini form create, atau tidak ada gambar lama, set ke default
                if (!imgPreview.dataset.existingImage) {
                     imgPreview.src = defaultImg;
                }
            }
        }
    }
</script>
*/
?>
<?= $this->endSection(); ?>