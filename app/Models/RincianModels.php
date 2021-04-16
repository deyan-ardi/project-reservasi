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
}