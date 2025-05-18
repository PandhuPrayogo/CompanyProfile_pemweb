<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<a href="<?= site_url('admin/faq/create'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">Tambah FAQ Baru</a>

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

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban Singkat</th>
            <th>Kategori</th>
            <th>Urutan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if (!empty($faqs) && is_array($faqs)) : ?>
            <?php foreach ($faqs as $f) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= esc($f['pertanyaan']); ?></td>
                    <td><?= character_limiter(esc(strip_tags($f['jawaban'])), 100); ?></td>
                    <td><?= esc($f['kategori']); ?></td>
                    <td><?= esc($f['urutan']); ?></td>
                    <td>
                        <a href="<?= site_url('admin/faq/edit/' . $f['id_faq']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= site_url('admin/faq/delete/' . $f['id_faq']); ?>" method="post" style="display:inline;">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data FAQ.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>