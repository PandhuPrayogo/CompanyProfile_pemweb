<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
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
        $data = [
            'title' => 'Catalogue | Ace Hobby Town',
        ];
        return view('pages/catalogue',  $data);
    }
    public function blog()
    {
        $data = [
            'title' => 'Blog | Ace Hobby Town',
        ];
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
