<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\ProdukModel;

class Kategori extends BaseController
{
    protected $kategoriModel;
    protected $produkModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->produkModel = new ProdukModel();
    }

    // Tampilkan halaman index
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('kategori/index', $data);
    }

    // Method untuk menampilkan produk berdasarkan kategori
    public function produkByKategori($id_kategori)
    {
        // Ambil produk berdasarkan ID kategori
        $produk = $this->produkModel->getProdukByKategori($id_kategori);

        // Kembalikan data produk dalam format JSON
        return $this->response->setJSON($produk);
    }

    // Simpan data kategori baru
    public function create()
    {
        $this->kategoriModel->save([
            'Nama_Kategori' => $this->request->getVar('nama_kategori')
        ]);

        return redirect()->to('/produk/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);
        return view('kategori/edit', $data);
    }

    // Update data kategori
    public function update($id)
    {
        // Memastikan kategori ada sebelum diupdate
        $kategori = $this->kategoriModel->find($id);
        if (!$kategori) {
            return redirect()->to('/produk/kategori')->with('error', 'Kategori tidak ditemukan');
        }

        // Melakukan update kategori
        $this->kategoriModel->update($id, [
            'Nama_Kategori' => $this->request->getVar('nama_kategori')
        ]);

        return redirect()->to('/produk/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    // Hapus kategori
    // Hapus kategori
    public function delete($id)
    {
        // Memastikan kategori ada sebelum dihapus
        $kategori = $this->kategoriModel->find($id);
        if (!$kategori) {
            return redirect()->to('/produk/kategori')->with('error', 'Kategori tidak ditemukan');
        }

        // Hapus produk yang terkait dengan kategori
        $this->produkModel->where('ID_Kategori', $id)->delete();

        // Menghapus kategori
        $this->kategoriModel->delete($id);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->to('/produk/kategori')->with('success', 'Kategori dan produk terkait berhasil dihapus.');
    }
}
