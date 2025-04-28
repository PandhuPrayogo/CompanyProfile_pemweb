<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function daftar()
    {
        $produkTersedia = $this->produkModel->where('jumlah_tersedia >', 0)->findAll();

        $data = [
            'title' => 'Daftar Produk Tersedia',
            'produk' => $produkTersedia,
        ];

        return view('produk/daftar_produk', $data);
    }
}