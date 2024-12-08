<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table      = 'stok';
    protected $primaryKey = 'ID_Produk'; // Ini juga foreign key dari tabel produk

    protected $allowedFields = ['Jumlah_Stok'];
}
