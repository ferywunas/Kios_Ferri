<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'ID_Pelanggan';

    // Kolom yang dapat diisi
    protected $allowedFields = ['Nama', 'Email', 'Alamat', 'No_tlp'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
