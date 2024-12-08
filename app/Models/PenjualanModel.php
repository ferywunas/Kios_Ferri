<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table      = 'penjualan';
    protected $primaryKey = 'ID_Penjualan';

    // Kolom yang dapat diisi
    protected $allowedFields = ['Tanggal_Penjualan', 'ID_Pelanggan', 'ID_Produk', 'Jumlah', 'Harga_Satuan', 'Total_Harga'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
