<?= $this->extend('layout/template_admin'); // Menggunakan layout admin yang sudah ada ?>

<?= $this->section('content_admin'); ?>

<?php if (session()->getFlashdata('error_pw')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error_pw'); ?></div>
<?php endif; ?>

<?php $errors_pw = session()->getFlashdata('errors_pw'); ?>

<form action="<?= site_url('auth/attempt-change-password'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="current_password">Password Saat Ini</label>
        <input type="password" name="current_password" id="current_password" class="form-control <?= isset($errors_pw['current_password']) ? 'is-invalid' : ''; ?>" required>
        <?php if (isset($errors_pw['current_password'])) : ?>
            <div class="invalid-feedback"><?= esc($errors_pw['current_password']); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="new_password">Password Baru</label>
        <input type="password" name="new_password" id="new_password" class="form-control <?= isset($errors_pw['new_password']) ? 'is-invalid' : ''; ?>" required>
        <?php if (isset($errors_pw['new_password'])) : ?>
            <div class="invalid-feedback"><?= esc($errors_pw['new_password']); ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="confirm_new_password">Konfirmasi Password Baru</label>
        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control <?= isset($errors_pw['confirm_new_password']) ? 'is-invalid' : ''; ?>" required>
        <?php if (isset($errors_pw['confirm_new_password'])) : ?>
            <div class="invalid-feedback"><?= esc($errors_pw['confirm_new_password']); ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Ubah Password</button>
    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>