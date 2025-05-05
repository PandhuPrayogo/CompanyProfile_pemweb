<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('pages/home');
        echo view('layout/footer');
    }
    public function about()
    {
        echo view('layout/header');
        echo view('pages/about');
        echo view('layout/footer');
    }
    public function catalogue()
    {
        echo view('layout/header');
        echo view('pages/catalogue');
        echo view('layout/footer');
    }
    public function blog()
    {
        echo view('layout/header');
        echo view('pages/blog');
        echo view('layout/footer');
    }
    public function faq()
    {
        echo view('layout/header');
        echo view('pages/faq');
        echo view('layout/footer');
    }
    public function admin()
    {
        echo view('pages/admin');
    }
}
