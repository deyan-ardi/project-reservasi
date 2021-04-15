<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModels extends Model
{
    protected $primaryKey = 'id_keranjang';
    protected $table      = 'keranjang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kamar', 'id_pesanan', 'id_user', 'layanan_kamar', 'sub_total'];
    protected $updatedField  = false;
    protected $deletedField  = false;

    public function cekKamarKeranjang($id_user, $id_pesanan, $id_kamar)
    {
        return $this->where('id_user', $id_user)->where('id_kamar', $id_kamar)->where('id_pesanan', $id_pesanan)->get()->getNumRows();
    }

    public function countKeranjang($id_user, $id_pesanan, $status = null)
    {
        if ($status == null) {
            return $this->where('id_user', $id_user)->where('id_pesanan', $id_pesanan)->get()->getNumRows();
        } else {
            $this->select('manajemen_kamar.nama_kamar, keranjang.*');
            $this->join('manajemen_kamar', 'manajemen_kamar.id_kamar = keranjang.id_kamar');
            return $this->where('keranjang.id_user', $id_user)->where('keranjang.id_pesanan', $id_pesanan)->get()->getResult();
        }
    }

    public function getAllRincian()
    {
        $this->select("keranjang.*,manajemen_kamar.nama_kamar,manajemen_kamar.no_kamar, manajemen_kamar.harga_kamar");
        return $this->join("manajemen_kamar", "manajemen_kamar.id_kamar = keranjang.id_kamar")->get()->getResult();
    }

    public function getAllReadyKamar($id_user, $id_pesanan)
    {
        $this->select('manajemen_kamar.nama_kamar,manajemen_kamar.status_kamar,manajemen_kamar.id_kamar, keranjang.*');
        $this->join('manajemen_kamar', 'manajemen_kamar.id_kamar = keranjang.id_kamar');
        return $this->where('keranjang.id_user', $id_user)->where('keranjang.id_pesanan', $id_pesanan)->get()->getResult();
    }
 
}