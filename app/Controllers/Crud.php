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
        //session();
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];

        echo view('template/header', $data);
        return view('buku/crud/create', $data);
        echo view('template/footer');
    }

    public function simpan()
    {

        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} buku harus di isi.',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ]



        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/crud/create')->withInput()->with('validation', $validation);
        }



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
