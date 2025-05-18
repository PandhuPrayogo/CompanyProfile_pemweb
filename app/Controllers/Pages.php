<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CatalogueModel;
use App\Models\ReviewModel; // Aktifkan (hilangkan komentar jika ada)

class Pages extends BaseController
{
    protected $catalogueModel;
    protected $blogModel;
    protected $reviewModel; // Aktifkan (hilangkan komentar jika ada)
    protected $helpers = ['url', 'text'];

    public function __construct()
    {
        $this->catalogueModel = new CatalogueModel();
        $this->blogModel = new BlogModel();
        $this->reviewModel = new ReviewModel(); // Aktifkan (hilangkan komentar jika ada)
    }

    public function index()
    {
        // Ambil data review yang statusnya 'approved' (jika Anda menggunakan kolom status)
        // Jika tidak menggunakan kolom status, atau ingin menampilkan semua, hilangkan ->where('status', 'approved')
        $reviewsData = $this->reviewModel
                            ->where('status', 'approved') // Opsional, tergantung implementasi Anda
                            ->orderBy('created_at', 'DESC') // Tampilkan yang terbaru dulu
                            ->findAll();

        $data = [
            'title'  => 'Home | Ace Hobby Town',
            'review' => $reviewsData, // Pastikan key-nya 'review' sesuai dengan di view home.php
            // Anda bisa tambahkan data lain untuk halaman home di sini, misalnya:
            // 'latest_products' => $this->catalogueModel->orderBy('created_at', 'DESC')->limit(4)->findAll(),
            // 'latest_blogs'    => $this->blogModel->orderBy('created_at', 'DESC')->limit(3)->findAll(),
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Ace Hobby Town',
        ];
        return view('pages/about', $data);
    }

    public function catalogue()
    {
        $catalogueItems = $this->catalogueModel->orderBy('updated_at', 'DESC')->findAll();
        $data = [
            'title'     => 'Catalogue | Ace Hobby Town',
            'catalogue' => $catalogueItems
        ];
        return view('pages/catalogue', $data);
    }

    public function blog()
    {
        $blogPosts = $this->blogModel->orderBy('updated_at', 'DESC')->findAll();
        $data = [
            'title' => 'Blog | Ace Hobby Town',
            'blog'  => $blogPosts
        ];
        return view('pages/blog', $data);
    }

    public function faq()
    {
        $data = [
            'title' => 'FAQ | Ace Hobby Town',
        ];
        return view('pages/faq', $data);
    }

    // ... (method detailBlog dan detailProduk jika ada) ...
}