<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModels extends Model
{
    protected $primaryKey = 'id_pesanan';
    protected $table      = 'pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'kode_pesanan', 'total_bayar', 'sisa_bayar', 'bukti_bayar', 'accept_date', 'pay_date', 'due_date', 'tamu_dewasa', 'tamu_anak', 'pesan', 'check_in', 'check_out', 'status_keranjang', 'status_pesanan', 'status_bukti', 'status_menginap', 'created_by'];
    protected $updatedField  = false;
    protected $deletedField  = false;
    public function getAllPesananWhere($id_user)
    {
        return $this->where("status_keranjang", 1)->where("status_pesanan", 0)->where("id_user", $id_user)->get()->getResult();
    }
    public function getDataPesananWhere($id_user)
    {
        $this->select("pesanan.*,users.username,users.alamat,users.email, users.no_tlp,");
        return $this->join('users', 'users.id = pesanan.id_user')->where("id_user", $id_user)->get()->getResult();
    }
    public function getAllPesananWhereBooking($id_user)
    {
        return $this->where("status_keranjang", 0)->where("status_pesanan", 1)->where("id_user", $id_user)->get()->getResult();
    }
    public function getPesananUser($id_pesanan)
    {
        $this->select('pesanan.*,users.username,users.email');
        return $this->join('users', 'users.id = pesanan.id_user')->where('id_pesanan', $id_pesanan)->get()->getResult();
    }
    public function getAllPesananBooking()
    {
        $this->select("pesanan.*,users.username,users.alamat,users.email, users.no_tlp,");
        return $this->join('users', 'users.id = pesanan.id_user')->where("status_pesanan", 1)->orWhere("status_pesanan", 2)->where("status_bukti", 0)->orderBy('created_at', 'ASC')->get()->getResult();
    }
    public function getAllPesananValidasi()
    {
        $this->select("pesanan.*,users.username,users.alamat,users.email, users.no_tlp,");
        return $this->join('users', 'users.id = pesanan.id_user')->where("status_bukti", 1)->orWhere("status_bukti", 2)->orWhere("status_bukti", 3)->orderBy('created_at', 'ASC')->get()->getResult();
    }
    public function getAllPesananTervalidasi()
    {
        $this->select("pesanan.*,users.username,users.alamat,users.email, users.no_tlp,");
        return $this->join('users', 'users.id = pesanan.id_user')->where("status_menginap", 1)->orWhere("status_menginap", 2)->orWhere("status_menginap", 3)->orderBy('created_at', 'ASC')->get()->getResult();
    }
    public function countPesanan($status)
    {
        if ($status == "pesanan") {
            return $this->where("status_pesanan", 1)->get()->getNumRows();
        } else if ($status == "bukti") {
            return $this->where("status_bukti", 2)->get()->getNumRows();
        } else {
            return $this->where("status_menginap", 1)->get()->getNumRows();
        }
    }
    public function getAllPesananUser()
    {
        $this->select('pesanan.*,users.username');
        return $this->join('users', 'users.id = pesanan.id_user')->limit(3)->orderBy('created_at', 'ASC')->get()->getResult();
    }
    public function cekReadyKamarByPesanan($id_kamar)
    {
        $this->select('pesanan.*,keranjang.id_kamar');
        $this->join('keranjang', 'keranjang.id_pesanan = pesanan.id_pesanan');
        return $this->where('keranjang.id_kamar', $id_kamar)->where('status_menginap', 1)->orWhere('status_menginap', 2)->get()->getResult();
    }
    public function getPesananWhereDate()
    {
        $this->select('pesanan.*,manajemen_kamar.*');
        $this->join('keranjang', 'keranjang.id_pesanan = pesanan.id_pesanan');
        $this->join('manajemen_kamar', 'manajemen_kamar.id_kamar = keranjang.id_kamar');
        return $this->where('status_menginap', 1)->orWhere('status_menginap', 2)->get()->getResult();
    }
}