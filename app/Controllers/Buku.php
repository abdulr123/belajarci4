<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        //$buku = $this->BukuModel->findAll();
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->BukuModel->getBuku()
        ];

        echo view('template/header', $data);
        return view('buku/index', $data);
        echo view('template/footer');
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->BukuModel->getBuku($slug)
        ];

        echo view('template/header', $data);
        return view('buku/detail', $data);
        echo view('template/footer');
    }
}
