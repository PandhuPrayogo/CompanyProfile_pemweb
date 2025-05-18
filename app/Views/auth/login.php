<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin'); ?></title>
    <style>
        /* Tambahkan CSS sederhana untuk halaman login di sini jika perlu */
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f6f9; margin: 0;}
        .login-container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .login-container h2 { text-align: center; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="text"], .form-group input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
         .btn-login { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .btn-login:hover { background-color: #0056b3; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; font-size: 0.9em; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .invalid-feedback { color: red; font-size: 0.8em; margin-top: 3px;}
    </style>
</head>
<body>
    <div class="login-container">
        <h2><?= esc($title ?? 'Admin Login'); ?></h2>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('pesan'); ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>

        <?php $errors = session()->getFlashdata('errors'); ?>

        <form action="<?= site_url('auth/attempt-login'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= old('username'); ?>" required>
                <?php if (isset($errors['username'])) : ?>
                    <div class="invalid-feedback"><?= esc($errors['username']); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                 <?php if (isset($errors['password'])) : ?>
                    <div class="invalid-feedback"><?= esc($errors['password']); ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>