<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Crud extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

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
        // rl_title digunakan untuk membuat field slug pada database terisi otomatis
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->BukuModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'cover'     => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/buku');
    }
}
