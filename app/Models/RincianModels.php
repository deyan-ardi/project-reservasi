<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianModels extends Model
{
    protected $primaryKey = 'id_rincian';
    protected $table      = 'rincian_pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_pesanan', 'nama_pemesan', 'check_in', 'check_out', 'pay_date', 'tamu_dewasa', 'tamu_anak', 'total_bayar'];
    protected $updatedField  = false;
    protected $deletedField  = false;

    public function countRincian()
    {
        return $this->get()->getNumRows();
    }
    public function getAllWhere($dari, $sampai)
    {
        return  $this->where('created_at >=', $dari)->where('created_at <=', $sampai)->get()->getResultArray();
    }
    public function getAllWherePesanan($id_pesanan)
    {
        return $this->where('id_rincian', $id_pesanan)->get()->getResultArray();
    }
}