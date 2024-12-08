<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'ID_Produk';

    protected $allowedFields = ['Nama_Produk', 'Harga_Produk', 'Stok', 'Deskripsi_Produk', 'ID_Kategori'];

    public function getProdukByKategori($id_kategori)
    {
        return $this->where('ID_Kategori', $id_kategori)->findAll();
    }
}
