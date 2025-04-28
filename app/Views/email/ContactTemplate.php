<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru dari <?= esc($name) ?></title>
</head>
<body>
    <h2>Detail Pesan</h2>
    <p><strong>Nama:</strong> <?= esc($name) ?></p>
    <p><strong>Email:</strong> <?= esc($email) ?></p>
    <p><strong>Telepon:</strong> <?= esc($phone) ?></p>
    <p><strong>Pesan:</strong></p>
    <p><?= nl2br(esc($message)) ?></p>
    
    <p>Pesan ini dikirim melalui form kontak website pada <?= date('d F Y H:i') ?></p>
</body>
</html>