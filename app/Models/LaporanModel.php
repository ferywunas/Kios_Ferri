<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'ID_Laporan';

    // Kolom yang dapat diisi (insert atau update)
    protected $allowedFields = ['ID_Penjualan', 'Tanggal_Laporan', 'Isi_Laporan'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
