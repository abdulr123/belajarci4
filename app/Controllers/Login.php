<?php

namespace App\Controllers;

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
}
