<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CatalogueModel;
use App\Models\ReviewModel;
use App\Models\FaqModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    protected $catalogueModel, $blogModel, $reviewModel,$faqModel;
    public function __construct()
    {
        $this->catalogueModel = new CatalogueModel();
        $this->blogModel = new BlogModel();
        $this->reviewModel = new ReviewModel();
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $review = $this->reviewModel->findAll();
        $data = [
            'title' => 'Home | Ace Hobby Town',
            'review' => $review
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Ace Hobby Town',
        ];
        return view('pages/about',$data);
    }
    public function catalogue()
    {
        $catalogue = $this->catalogueModel->findAll();
        $data = [
            'title' => 'Catalogue | Ace Hobby Town',
            'catalogue' => $catalogue
    ];

        return view('pages/catalogue', $data);
    }
    public function blog()
    {
        $blog = $this->blogModel->findAll();
        $data = [
            'title' => 'Blog | Ace Hobby Town',
            'blog' => $blog
        ];
        return view('pages/blog',  $data);
    }
    public function faq()
    {
        $faq = $this->faqModel->findAll();
        $data = [
            'title' => 'FAQ | Ace Hobby Town',
            'faq' => $faq
        ];
        return view('pages/faq',  $data);
    }
    public function admin()
    {
        echo view('pages/admin');
    }
}
