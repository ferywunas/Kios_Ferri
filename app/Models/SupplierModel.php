<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'ID_Supplier';

    // Kolom yang dapat diisi
    protected $allowedFields = ['Nama_Supplier', 'Alamat_Supplier', 'Telepon_Supplier'];

    // Opsi pengaturan timestamp otomatis (jika ada)
    protected $useTimestamps = false;
}
