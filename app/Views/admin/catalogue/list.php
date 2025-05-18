<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<a href="<?= site_url('admin/catalogue/create'); ?>" class="btn btn-primary mb-3">Tambah Produk Baru</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Terakhir Update</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if (!empty($catalogues)) : ?>
            <?php foreach ($catalogues as $c) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="<?= base_url('img/' . esc($c['gambar_produk'])); ?>" alt="<?= esc($c['nama_produk']); ?>" width="100" style="max-height:70px; object-fit:cover;"></td>
                    <td><?= esc($c['nama_produk']); ?></td>
                    <td>Rp <?= number_format(esc($c['harga_produk']), 0, ',', '.'); ?></td>
                    <td><?= esc($c['stok_tersedia']); ?></td>
                    <td><?= esc($c['updated_at']); ?></td>
                    <td>
                        <a href="<?= site_url('admin/catalogue/edit/' . $c['slug']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= site_url('admin/catalogue/delete/' . $c['id_produk']); ?>" method="post" style="display:inline;">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
             <tr>
                <td colspan="7" class="text-center">Belum ada data produk.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>