<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        // Pastikan session helper sudah di-load (biasanya di BaseController atau auto-load)
        // Jika belum, Anda bisa load di sini:
        // $this->session = \Config\Services::session();
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard admin
        if (session()->get('isLoggedInAdmin')) {
            return redirect()->to('admin/dashboard');
        }

        $data = [
            'title' => 'Admin Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data); // Buat view login.php di app/Views/auth/
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Password cocok, buat session
                $adminData = [
                    'id_user'   => $user['id_user'],
                    'username'  => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'role'      => $user['role'],
                    'isLoggedInAdmin' => true
                ];
                session()->set($adminData);
                return redirect()->to('admin/dashboard')->with('pesan', 'Login berhasil! Selamat datang, ' . $user['nama_lengkap']);
            } else {
                // Password salah
                return redirect()->to('login')->withInput()->with('error', 'Password yang Anda masukkan salah.');
            }
        } else {
            // Username tidak ditemukan
            return redirect()->to('login')->withInput()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login')->with('pesan', 'Anda telah berhasil logout.');
    }

    // --- Fitur Ubah Password ---
    public function changePassword()
    {
        // Pastikan admin sudah login untuk mengakses halaman ini
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to('login');
        }

        $data = [
            'title' => 'Ubah Password Admin',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/change_password', $data); // Buat view change_password.php
    }

    public function attemptChangePassword()
    {
        if (!session()->get('isLoggedInAdmin')) {
            return redirect()->to('login');
        }

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]', // Minimal 8 karakter
            'confirm_new_password' => 'required|matches[new_password]'
        ];

        $errors = [
            'current_password' => ['required' => 'Password saat ini harus diisi.'],
            'new_password'     => ['required' => 'Password baru harus diisi.', 'min_length' => 'Password baru minimal 8 karakter.'],
            'confirm_new_password' => ['required' => 'Konfirmasi password baru harus diisi.', 'matches' => 'Konfirmasi password baru tidak cocok dengan password baru.']
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->to('auth/change-password')->withInput()->with('errors_pw', $this->validator->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $userId = session()->get('id_user');

        $user = $this->userModel->find($userId);

        if ($user && password_verify($currentPassword, $user['password'])) {
            // Password lama cocok, update dengan password baru
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->userModel->update($userId, ['password' => $hashedNewPassword]);

            // Opsional: Logout user setelah ganti password agar login ulang
            // session()->destroy();
            // return redirect()->to('login')->with('pesan', 'Password berhasil diubah. Silakan login kembali.');
            
            return redirect()->to('admin/dashboard')->with('pesan', 'Password berhasil diubah.');

        } else {
            // Password lama salah
            return redirect()->to('auth/change-password')->withInput()->with('error_pw', 'Password saat ini yang Anda masukkan salah.');
        }
    }
}