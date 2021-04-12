<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModels extends Model
{
    protected $primaryKey = 'id_kamar';
    protected $table      = 'manajemen_kamar';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kamar', 'deskripsi_kamar', 'harga_kamar', 'foto_kamar', 'id_kategori', 'no_kamar', 'id_keranjang', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllKamar($id_kamar = null)
    {
        if ($id_kamar == null) {
            $this->select('manajemen_kamar.*,kategori_kamar.nama_kategori');
            return $this->join('kategori_kamar', 'manajemen_kamar.id_kategori = kategori_kamar.id_kategori')->get()->getResult();
        } else {
            $this->select('manajemen_kamar.*,kategori_kamar.nama_kategori');
            return $this->join('kategori_kamar', 'manajemen_kamar.id_kategori = kategori_kamar.id_kategori')->where('id_kamar', $id_kamar)->get()->getResult();
        }
    }
}