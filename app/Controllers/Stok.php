<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;
use App\Models\ProdukModel;

class Stok extends BaseController
{
    protected $stokModel;
    protected $produkModel;

    public function __construct()
    {
        $this->stokModel = new StokModel();
        $this->produkModel = new ProdukModel();
    }

    // Tampilkan halaman index
    public function index()
    {
        $data['stok'] = $this->stokModel->findAll();
        $data['produk'] = $this->produkModel->findAll(); // Mengambil semua produk
        return view('stok/index', $data);
    }

    // Simpan data stok baru
    public function create()
    {
        $this->stokModel->save([
            'ID_Produk' => $this->request->getVar('id_produk'),
            'Jumlah_Stok' => $this->request->getVar('jumlah_stok'),
        ]);

        return redirect()->to('/produk/stok')->with('success', 'Stok berhasil ditambahkan');
    }

    // Menampilkan form edit stok
    public function edit($id)
    {
        $data['stok'] = $this->stokModel->find($id);
        $data['produk'] = $this->produkModel->findAll(); // Mengambil semua produk untuk pilihan
        return view('stok/edit', $data);
    }

    // Update data stok
    public function update($id)
    {
        $this->stokModel->update($id, [
            'ID_Produk' => $this->request->getVar('id_produk'),
            'Jumlah_Stok' => $this->request->getVar('jumlah_stok'),
        ]);

        return redirect()->to('/produk/stok')->with('success', 'Stok berhasil diupdate');
    }

    // Hapus stok
    public function delete($id)
    {
        $this->stokModel->delete($id);
        return redirect()->to('/produk/stok')->with('success', 'Stok berhasil dihapus');
    }
}
