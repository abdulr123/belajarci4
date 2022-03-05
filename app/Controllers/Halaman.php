<?php

namespace App\Controllers;

class Halaman extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home - Belajar CodeIgniter 4'
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
