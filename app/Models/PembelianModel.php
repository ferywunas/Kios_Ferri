<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'pembelian';
    protected $primaryKey = 'ID_Pembelian';

    // Kolom yang dapat diisi
    protected $allowedFields = ['Tanggal_Pembelian', 'ID_Supplier', 'ID_Produk', 'Jumlah', 'Harga_Satuan', 'Total_Harga'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
