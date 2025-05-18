<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content_admin'); ?>
<a href="<?= site_url('admin/review/create'); ?>" class="btn btn-primary" style="margin-bottom: 15px;">Tambah Review Baru</a>

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
            <th>Profil</th>
            <th>Nama Pelanggan</th>
            <th>Sebutan</th>
            <th>Rating</th>
            <th>Review Singkat</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if (!empty($reviews) && is_array($reviews)) : ?>
            <?php foreach ($reviews as $rev) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="<?= base_url('img/' . esc($rev['profile_pelanggan'], 'attr')); ?>" alt="<?= esc($rev['nama_pelanggan'], 'attr'); ?>" width="50" style="height:50px; object-fit:cover; border-radius: 50%;"></td>
                    <td><?= esc($rev['nama_pelanggan']); ?></td>
                    <td><?= esc($rev['sebutan_pelanggan']); ?></td>
                    <td><?= esc($rev['jumlah_rating']); ?> <i class="ri-star-fill" style="color:orange;"></i></td>
                    <td><?= character_limiter(esc(strip_tags($rev['teks_review'])), 70); ?></td>
                    <td>
                        <span class="badge badge-<?= ($rev['status'] == 'approved') ? 'success' : (($rev['status'] == 'pending') ? 'warning' : 'danger'); ?>">
                            <?= ucfirst(esc($rev['status'])); ?>
                        </span>
                    </td>
                    <td><?= esc(date('d M Y', strtotime($rev['created_at']))); ?></td>
                    <td>
                        <a href="<?= site_url('admin/review/edit/' . $rev['id_review']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= site_url('admin/review/delete/' . $rev['id_review']); ?>" method="post" style="display:inline;">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus review dari <?= esc($rev['nama_pelanggan'], 'js'); ?>?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="9" style="text-align: center;">Belum ada data review.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<style>.badge{padding:.35em .65em;font-size:75%;font-weight:700;line-height:1;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25rem}.badge-success{color:#fff;background-color:#28a745}.badge-warning{color:#212529;background-color:#ffc107}.badge-danger{color:#fff;background-color:#dc3545}</style>
<?= $this->endSection(); ?>