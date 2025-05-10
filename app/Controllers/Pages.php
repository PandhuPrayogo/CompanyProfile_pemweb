<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CatalogueModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    protected $catalogueModel, $blogModel;
    public function __construct()
    {
    $this->catalogueModel = new CatalogueModel();
    $this->blogModel = new BlogModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home | Ace Hobby Town',
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

        dd($blog);
        return view('pages/blog',  $data);
    }
    public function faq()
    {
        $data = [
            'title' => 'FAQ | Ace Hobby Town',
        ];
        return view('pages/faq',  $data);
    }
    public function admin()
    {
        echo view('pages/admin');
    }
}
