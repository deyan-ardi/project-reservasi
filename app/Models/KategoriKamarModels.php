<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriKamarModels extends Model
{
    protected $primaryKey = 'id_kategori';
    protected $table      = 'kategori_kamar';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kategori', 'deskripsi', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
}