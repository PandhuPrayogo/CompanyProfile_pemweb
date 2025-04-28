<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    </head>
<body>
    <h1><?= esc($title) ?></h1>

    <?php if (!empty($produk)): ?>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Tersedia</th>
                    <th>Merk</th>
                    <th>Lisensi</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td>
                            <?php if (!empty($item['foto_produk'])): ?>
                                <img src="<?= base_url('uploads/' . esc($item['foto_produk'])) ?>" alt="<?= esc($item['nama_produk']) ?>" width="100">
                            <?php else: ?>
                                Tidak ada foto
                            <?php endif; ?>
                        </td>
                        <td><?= esc($item['nama_produk']) ?></td>
                        <td><?= esc($item['jumlah_tersedia']) ?></td>
                        <td><?= esc($item['merk_produk']) ?></td>
                        <td><?= esc($item['lisensi_produk']) ?></td>
                        <td><?= esc($item['jenis_produk']) ?></td>
                        <td><?= esc($item['deskripsi_produk']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada produk yang tersedia saat ini.</p>
    <?php endif; ?>

    </body>
</html>