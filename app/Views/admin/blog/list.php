<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<a href="<?= site_url('admin/blog/create'); ?>" class="btn btn-primary mb-3">Tambah Postingan Blog Baru</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi Singkat</th>
            <th>Terakhir Update</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <?php $i = 1; ?>
    <?php if (!empty($blogs) && is_array($blogs)) : ?> 
        <?php foreach ($blogs as $b) : ?> 
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="<?= base_url('img/' . esc($b['gambar_blog'], 'attr')); ?>" alt="<?= esc($b['judul_blog'], 'attr'); ?>" width="100" style="max-height:70px; object-fit:cover; border-radius: 4px;"></td>
                <td><?= esc($b['judul_blog']); ?></td>
                <td><?= character_limiter(esc(strip_tags($b['deskripsi_blog'])), 100); ?></td>
                <td><?= esc(date('d M Y, H:i', strtotime($b['updated_at']))); ?></td>
                <td>
                    <a href="<?= site_url('admin/blog/edit/' . esc($b['slug'], 'url')); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?= site_url('admin/blog/delete/' . $b['id_blog']); ?>" method="post" style="display:inline;">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan <?= esc($b['judul_blog'], 'js'); ?>?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6" style="text-align: center;">Belum ada data blog.</td> 
        </tr>
    <?php endif; ?>
</tbody>
</table>
<?= $this->endSection(); ?>