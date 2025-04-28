<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Home extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            
            // Coba eksekusi query sederhana untuk memastikan koneksi benar-benar bekerja
            $db->query('SELECT 1');
            
            // Jika sampai di sini tanpa exception, koneksi berhasil
            return 'Koneksi Database Berhasil!';
            
        } catch (\Exception $e) {
            // Tangkap semua jenis exception, termasuk DatabaseException
            log_message('error', 'Database connection error: ' . $e->getMessage());
            
            // Tampilkan pesan error yang lebih informatif
            $errorMessage = 'Koneksi Database Gagal!';
            $errorMessage .= '<br>Error: ' . $e->getMessage();
            $errorMessage .= '<br>Periksa konfigurasi database Anda:';
            $errorMessage .= '<br>- Host: localhost';
            $errorMessage .= '<br>- Database: web_inventory';
            $errorMessage .= '<br>- Port: 3306';
            
            return $errorMessage;
        }
    }
}