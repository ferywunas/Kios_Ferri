<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\PembelianModel;  // Model untuk tabel pembelian
use App\Models\PenjualanModel;  // Model untuk tabel penjualan
class Produk extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;
    protected $pembelianModel;
    protected $penjualanModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
        $this->pembelianModel = new PembelianModel();  // Inisialisasi model pembelian
        $this->penjualanModel = new PenjualanModel();  // Inisialisasi model penjualan
    }

    // Tampilkan halaman index
    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('produk/index', $data);
    }

    // Simpan data produk baru
    public function create()
    {
        $this->produkModel->save([
            'Nama_Produk'    => $this->request->getVar('nama_produk'),
            'Harga_Produk'   => $this->request->getVar('harga_produk'),
            'Stok'   => $this->request->getVar('Stok'),
            'Deskripsi_Produk' => $this->request->getVar('deskripsi_produk'),
            'ID_Kategori'    => $this->request->getVar('id_kategori'),
        ]);

        return redirect()->to('/produk/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('produk/edit', $data);
    }

    // Update data produk
    public function update($id)
    {
        $this->produkModel->update($id, [
            'Nama_Produk'    => $this->request->getVar('nama_produk'),
            'Harga_Produk'   => $this->request->getVar('harga_produk'),
            'Stok'   => $this->request->getVar('Stok'),
            'Deskripsi_Produk' => $this->request->getVar('deskripsi_produk'),
            'ID_Kategori'    => $this->request->getVar('id_kategori'),
        ]);

        return redirect()->to('/produk/produk')->with('success', 'Produk berhasil diupdate');
    }

    // Hapus produk
    public function delete($id)
    {
        // Hapus data di tabel pembelian yang terkait dengan produk
        $this->pembelianModel->where('ID_Produk', $id)->delete();

        // Hapus data di tabel penjualan yang terkait dengan produk
        $this->penjualanModel->where('ID_Produk', $id)->delete();

        // Jika ada laporan atau data terkait lain yang perlu dihapus, tambahkan di sini
        // Contoh: $this->laporanModel->where('ID_Produk', $id)->delete();

        // Hapus data produk
        $this->produkModel->delete($id);

        return redirect()->to('/produk/produk')->with('success', 'Produk beserta data terkait berhasil dihapus');
    }
}
