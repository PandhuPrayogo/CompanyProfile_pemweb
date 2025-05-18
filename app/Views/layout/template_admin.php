<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Area'); ?> - AceHobbyTown</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f6f9; color: #333; }
        .admin-header { background-color: #343a40; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        .admin-header h1 { margin: 0; font-size: 1.5em; }
        .admin-nav ul { list-style: none; padding: 0; margin: 0; display: flex; }
        .admin-nav li { margin-left: 20px; }
        .admin-nav a { color: white; text-decoration: none; font-weight: 500; }
        .admin-nav a:hover { text-decoration: underline; }
        .admin-container { max-width: 1200px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #dee2e6; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #e9ecef; }
        .btn { display: inline-block; font-weight: 400; color: #212529; text-align: center; vertical-align: middle; cursor: pointer; background-color: transparent; border: 1px solid transparent; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .25rem; text-decoration: none; margin-right: 5px; margin-bottom: 5px;}
        .btn-primary { color: #fff; background-color: #007bff; border-color: #007bff; }
        .btn-warning { color: #212529; background-color: #ffc107; border-color: #ffc107; }
        .btn-danger { color: #fff; background-color: #dc3545; border-color: #dc3545; }
        .btn-secondary { color: #fff; background-color: #6c757d; border-color: #6c757d; }
        .btn-sm { padding: .25rem .5rem; font-size: .875rem; line-height: 1.5; border-radius: .2rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: .5rem; font-weight: 500; }
        .form-control { display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; box-sizing: border-box;}
        .form-control:focus { border-color: #80bdff; outline: 0; box-shadow: 0 0 0 .2rem rgba(0,123,255,.25); }
        .custom-file-input { cursor: pointer; }
        .img-preview { max-width: 150px; max-height: 150px; margin-top: 10px; display: block; border:1px solid #ddd; padding:5px; }
        .alert { position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
        .invalid-feedback { display: block; width: 100%; margin-top: .25rem; font-size: 80%; color: #dc3545; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1>AceHobbyTown Admin</h1>
        <nav class="admin-nav">
            <ul>
                <li><a href="<?= site_url('auth/change-password'); ?>">Ubah Password</a></li>
                <li><a href="<?= site_url('logout'); ?>">Logout</a></li>
                <li><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                <li><a href="<?= site_url('admin/review'); ?>">Review</a></li>
                <li><a href="<?= site_url('admin/blog'); ?>">Blog</a></li>
                <li><a href="<?= site_url('admin/catalogue'); ?>">Katalog</a></li>
                <li><a href="<?= site_url('/'); ?>" target="_blank">Lihat Website</a></li>
            </ul>
        </nav>
    </header>

    <main class="admin-container">
        <h2><?= esc($title ?? 'Halaman Admin'); ?></h2>
        <hr>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content_admin'); ?>
    </main>

    <footer class="text-center" style="margin-top: 30px; padding: 15px; background-color: #e9ecef;">
        <p>&copy; <?= date('Y'); ?> AceHobbyTown. All Rights Reserved.</p>
    </footer>

</body>
</html>