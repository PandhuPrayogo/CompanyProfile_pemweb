<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<form action="<?= site_url('admin/review/update/' . $review['id_review']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="gambar_lama" value="<?= esc($review['profile_pelanggan'], 'attr'); ?>">
    <?php $errors = session()->getFlashdata('errors'); ?>

    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control <?= isset($errors['nama_pelanggan']) ? 'is-invalid' : ''; ?>" id="nama_pelanggan" name="nama_pelanggan" value="<?= old('nama_pelanggan', esc($review['nama_pelanggan'])); ?>" autofocus>
        <?php if (isset($errors['nama_pelanggan'])) : ?><div class="invalid-feedback"><?= esc($errors['nama_pelanggan']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="sebutan_pelanggan">Sebutan Pelanggan</label>
        <input type="text" class="form-control <?= isset($errors['sebutan_pelanggan']) ? 'is-invalid' : ''; ?>" id="sebutan_pelanggan" name="sebutan_pelanggan" value="<?= old('sebutan_pelanggan', esc($review['sebutan_pelanggan'])); ?>">
        <?php if (isset($errors['sebutan_pelanggan'])) : ?><div class="invalid-feedback"><?= esc($errors['sebutan_pelanggan']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="teks_review">Teks Review</label>
        <textarea class="form-control <?= isset($errors['teks_review']) ? 'is-invalid' : ''; ?>" id="teks_review" name="teks_review" rows="5"><?= old('teks_review', esc($review['teks_review'])); ?></textarea>
        <?php if (isset($errors['teks_review'])) : ?><div class="invalid-feedback"><?= esc($errors['teks_review']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="jumlah_rating">Jumlah Rating (1-5)</label>
        <input type="number" class="form-control <?= isset($errors['jumlah_rating']) ? 'is-invalid' : ''; ?>" id="jumlah_rating" name="jumlah_rating" value="<?= old('jumlah_rating', esc($review['jumlah_rating'])); ?>" min="1" max="5">
        <?php if (isset($errors['jumlah_rating'])) : ?><div class="invalid-feedback"><?= esc($errors['jumlah_rating']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control <?= isset($errors['status']) ? 'is-invalid' : ''; ?>">
            <option value="approved" <?= old('status', $review['status']) == 'approved' ? 'selected' : ''; ?>>Approved</option>
            <option value="pending" <?= old('status', $review['status']) == 'pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="rejected" <?= old('status', $review['status']) == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
        </select>
         <?php if (isset($errors['status'])) : ?><div class="invalid-feedback"><?= esc($errors['status']); ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label for="profile_pelanggan">Foto Profil Pelanggan (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" class="form-control custom-file-input <?= isset($errors['profile_pelanggan']) ? 'is-invalid' : ''; ?>" id="profile_pelanggan" name="profile_pelanggan" onchange="previewGeneral('profile_pelanggan', 'img-preview-review')">
        <?php if (isset($errors['profile_pelanggan'])) : ?><div class="invalid-feedback" style="display:block;"><?= esc($errors['profile_pelanggan']); ?></div><?php endif; ?>
        <img src="<?= base_url('img/' . (empty($review['profile_pelanggan']) || !file_exists(FCPATH . 'img/' . $review['profile_pelanggan']) ? 'default_profile.jpg' : esc($review['profile_pelanggan'], 'attr'))); ?>"
             class="img-preview img-preview-review"
             data-existing-image="true"
             alt="Preview Foto Profil">
    </div>

    <button type="submit" class="btn btn-primary">Update Review</button>
    <a href="<?= site_url('admin/review'); ?>" class="btn btn-secondary">Kembali</a>
</form>
<?= $this->endSection(); ?>