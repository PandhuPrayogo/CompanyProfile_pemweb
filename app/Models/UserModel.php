<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users'; // Nama tabel user Anda
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Atau 'object' jika lebih suka
    protected $allowedFields    = ['username', 'password', 'nama_lengkap', 'role'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Anda bisa menambahkan method untuk verifikasi password di sini nanti
    // atau method untuk mendapatkan user berdasarkan username.
    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
}