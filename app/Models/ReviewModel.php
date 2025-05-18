<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table            = 'review'; // Pastikan nama tabel ini sesuai dengan yang Anda buat
    protected $primaryKey       = 'id_review'; // Pastikan primary key ini sesuai
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false; // Set true jika ingin menggunakan soft delete

    // Kolom yang diizinkan untuk diisi saat insert/update melalui model
    protected $allowedFields    = [
        'nama_pelanggan',
        'sebutan_pelanggan',
        'teks_review',
        'jumlah_rating',
        'profile_pelanggan',
        'status' // Tambahkan jika Anda menggunakan kolom status
    ];

    // Menggunakan timestamps bawaan CodeIgniter (created_at, updated_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at'; // Aktifkan jika useSoftDeletes true

    // Anda bisa menambahkan aturan validasi di sini jika diperlukan
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks (jika ada fungsi yang ingin dijalankan sebelum/sesudah event tertentu)
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}