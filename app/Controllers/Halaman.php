<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Halaman extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home - Belajar CodeIgniter 4',
            'buku' => $this->BukuModel->getBuku()
        ];
        echo view('template/header', $data);
        return view('halaman/home');
        echo view('template/footer');
    }
    public function aboutme()
    {
        $data = [
            'title' => 'About Me'
        ];
        echo view('template/header', $data);
        return view('halaman/aboutme');
        echo view('template/footer');
    }
}
