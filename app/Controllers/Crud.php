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
                'rules'         => 'required|is_unique[buku.judul]',
                'errors'        => [
                    'required'  => '{field} buku harus di isi.',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            // untuk validasi gambar bisa cek pada dokumentasi codeigniter https://www.codeigniter.com/user_guide/libraries/validation.html
            'cover' => [
                'rules'         => 'is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',

                'errors'        => [
                    //'uploaded'  => 'Cover buku harus dipilih.',
                    'is_image'  => 'Yang anda pilih bukan gambar.',
                    'mime_in'   => 'Cover buku harus berekstensi png,jpg,gif.'
                ]
            ]

        ])) {
            //$validation = \Config\Services::validation();
            //return redirect()->to('/crud/create')->withInput()->with('validation', $validation);
            return redirect()->to('/crud/create')->withInput();
        }

        //VERSI GAMBAR WAJIB DI UPLOAD
        //ambil terlebih dulu gambarnya
        //$fileCover = $this->request->getFile('cover');
        //lalu pindahkan file kedalam folder img
        //$fileCover->move('img');
        //ambil nama file cover
        //$namaCover = $fileCover->getName();

        //VERSI GAMBAR TIDAK WAJIB DI UPLOAD DAN LANGSUNG DI RENAME
        //ambil terlebih dulu gambarnya
        $fileCover = $this->request->getFile('cover');
        //cek apakah tidak ada gambar yang di upload
        if ($fileCover->getError() == 4) {
            $namaCover = 'default.png';
        } else {
            //generate nama cover acak
            $namaCover = $fileCover->getRandomName();
            //pindahkan file cover
            $fileCover->move('img', $namaCover);
        }

        // rl_title digunakan untuk membuat field slug pada database terisi otomatis
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->BukuModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'cover'     => $namaCover
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->BukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/buku');
    }


    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->BukuModel->getBuku($slug)
        ];

        echo view('template/header', $data);
        return view('buku/crud/edit', $data);
        echo view('template/footer');
    }

    public function update($id)
    {
        // validasi update 
        // cek judul
        $bukuLama = $this->BukuModel->getBuku($this->request->getVar('slug'));
        // jika judul lama sama dengan judul yang akan di inputkan maka jalankan rules nya
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.judul]';
        }


        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} buku harus di isi.',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            // untuk validasi gambar bisa cek pada dokumentasi codeigniter https://www.codeigniter.com/user_guide/libraries/validation.html
            'cover' => [
                'rules'         => 'is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',

                'errors'        => [
                    //'uploaded'  => 'Cover buku harus dipilih.',
                    'is_image'  => 'Yang anda pilih bukan gambar.',
                    'mime_in'   => 'Cover buku harus berekstensi png,jpg,gif.'
                ]
            ]

        ])) {

            return redirect()->to('/crud/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileCover = $this->request->getFile('cover');


        //cek gambar, apakah tetap gambar yang lama
        //angka 4 diasumsikan bahwa tidak ada perubahan data atau file tidak ada
        if ($fileCover->getError() == 4) {
            $namaCover = $this->request->getVar('coverLama');
        } else {
            //generate nama file random
            $namaCover = $fileCover->getRandomName();
            //pindahkan gambar
            $fileCover->move('img', $namaCover);
            //hapus file yang lama
            unlink('img/' . $this->request->getVar('coverLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->BukuModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'cover'     => $namaCover
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/buku');
    }
}
