<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'ID_Pembayaran';

    // Kolom yang dapat diisi
    protected $allowedFields = ['ID_Penjualan', 'Metode_Pembayaran', 'Status_Pembayaran'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
