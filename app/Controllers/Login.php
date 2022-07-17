<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{

    public function index()
    {
        //$buku = $this->BukuModel->findAll();
        $data = [
            'title' => 'Member Login',
            //'buku' => $this->BukuModel->getBuku()
        ];


        return view('login/login', $data);
    }

    public function cekUser()
    {
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password');
        $validation = \Config\Services::validation();

        //proses validasi form input
        $valid      = $this->validate([
            'username'    => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password'    => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

        ]);

        //proses validasi form input
        if (!$valid) {
            $sessError = [
                'errUsername' => $validation->getError('username'),
                'errPassword' => $validation->getError('password'),
            ];
            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login'));
        } else {
            $modelLogin = new ModelLogin();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $dataUser = $modelLogin->where([
                'username' => $username,
            ])->first();

            //proses login untuk mengecek apakah sudah ada user yang terdaftar
            if ($dataUser == null) {
                $sessError = [
                    'errUsername' => 'Maaf username tidak terdaftar',
                ];
                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login'));
            } else {
                $passwordUser = $dataUser['password'];
                if (password_verify($password, $passwordUser)) {
                    $level = $dataUser['level'];
                    $simpan_session = [
                        'username' => $username,
                        'level'    => $level,
                    ];
                    session()->set($simpan_session);
                    return redirect()->to(base_url('halaman'));
                } else {
                    $sessError = [
                        'errPassword' => 'Password anda salah',
                    ];
                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login'));
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('halaman');
    }

    public function registrasi()
    {

        $data = [
            'title' => 'Registrasi User',
            //'buku' => $this->BukuModel->getBuku()
        ];

        return view('login/registrasi', $data);
    }
}
