<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk'; // Ganti dengan nama tabel produk kamu
    protected $primaryKey = 'id_produk'; // Ganti dengan nama primary key kamu
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    // Jika ada field deleted_at untuk soft delete
    // protected $deletedField  = 'deleted_at';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_produk', 'deskripsi_produk', 'merk_produk', 'lisensi_produk', 'jenis_produk', 'jumlah_tersedia', 'foto_produk'];

    // Aturan validasi jika diperlukan
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}