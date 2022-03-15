<?php

namespace App\Controllers;

class Crud extends BaseController
{
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
        ];

        echo view('template/header', $data);
        return view('buku/crud/create', $data);
        echo view('template/footer');
    }

    public function simpan()
    {
    }
}
