<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModels extends Model
{
    protected $primaryKey = 'id_pesanan';
    protected $table      = 'pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'kode_pesanan', 'total_bayar', 'bukti_bayar', 'accept_date', 'pay_date', 'due_date', 'tamu_dewasa', 'tamu_anak', 'pesan', 'check_in', 'check_out', 'status_keranjang', 'status_pesanan', 'status_bukti', 'status_menginap', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllPesananWhere($id_user)
    {
        return $this->where("status_keranjang", 1)->where("status_pesanan", 0)->where("id_user", $id_user)->get()->getResult();
    }
    public function getDataPesananWhere($id_user)
    {
        return $this->where("id_user", $id_user)->get()->getResult();
    }
    public function getAllPesananWhereBooking($id_user)
    {
        return $this->where("status_keranjang", 0)->where("status_pesanan", 1)->where("id_user", $id_user)->get()->getResult();
    }
    public function getAllPesananBooking()
    {
        $this->select("pesanan.*,users.username,users.alamat,users.email, users.no_tlp,");
        return $this->join('users', 'users.id = pesanan.id_user')->where("status_pesanan", 1)->orWhere("status_pesanan", 0)->where("status_bukti", 0)->orderBy('created_at', 'ASC')->get()->getResult();
    }
}