<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CatalogueModel;
use App\Models\ReviewModel;
use App\Models\FaqModel; // Ambil dari remote

class Pages extends BaseController
{
    // Gabungkan deklarasi properti model
    protected $catalogueModel;
    protected $blogModel;
    protected $reviewModel;
    protected $faqModel; // Ambil dari remote

    // Ambil deklarasi helper Anda
    protected $helpers = ['url', 'text'];

    public function __construct()
    {
        // Gabungkan inisialisasi model
        $this->catalogueModel = new CatalogueModel();
        $this->blogModel = new BlogModel();
        $this->reviewModel = new ReviewModel();
        $this->faqModel = new FaqModel(); // Ambil dari remote
    }

    public function index()
    {
        // Kode Anda untuk method index (menggunakan reviewModel) sudah benar
        $reviewsData = $this->reviewModel->findAll();

        $data = [
            'title'  => 'Home | Ace Hobby Town',
            'review' => $reviewsData,
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        // Kode Anda untuk about sudah benar
        $data = [
            'title' => 'About | Ace Hobby Town',
        ];
        return view('pages/about', $data);
    }

    public function catalogue()
    {
        // Kode Anda untuk catalogue sudah benar
        $catalogueItems = $this->catalogueModel->orderBy('updated_at', 'DESC')->findAll();
        $data = [
            'title'     => 'Catalogue | Ace Hobby Town',
            'catalogue' => $catalogueItems
        ];
        return view('pages/catalogue', $data);
    }

    public function blog()
    {
        // Kode Anda untuk blog sudah benar
        $blogPosts = $this->blogModel->orderBy('updated_at', 'DESC')->findAll();
        $data = [
            'title' => 'Blog | Ace Hobby Town',
            'blog'  => $blogPosts
        ];
        return view('pages/blog', $data);
    }

    public function faq()
    {
        // Ambil kode method faq dari versi remote yang menggunakan faqModel
        $faqItems = $this->faqModel->orderBy('id_faq', 'ASC')->findAll(); // Asumsi ada kolom id_faq untuk urutan
        $data = [
            'title' => 'FAQ | Ace Hobby Town',
            'faq'   => $faqItems // Kirim data faq ke view pages/faq.php
        ];
        return view('pages/faq', $data);
    }

    // Jika Anda memiliki method detailBlog dan detailProduk, biarkan seperti yang sudah Anda buat.
    // public function detailBlog($slug = null) { ... }
    // public function detailProduk($slug = null) { ... }
}