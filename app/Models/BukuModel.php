<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table      = 'buku';
    protected $useTimestamps = true;

    public function getBuku($slug = false)
    {
        //jika tidak ada slug maka tampilkan semua
        if ($slug == false) {
            return $this->findAll();
        }
        //jika ada slug maka tampilkan data pertama
        return $this->where(['slug' => $slug])->first();
    }
}
