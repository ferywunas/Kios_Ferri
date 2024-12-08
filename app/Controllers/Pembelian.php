<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembelianModel;
use App\Models\SupplierModel;
use App\Models\ProdukModel;

class Pembelian extends BaseController
{
    protected $pembelianModel;
    protected $supplierModel;
    protected $produkModel;

    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
        $this->supplierModel = new SupplierModel();
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data['pembelian'] = $this->pembelianModel->findAll();
        $data['supplier'] = $this->supplierModel->findAll();
        $data['produk'] = $this->produkModel->findAll();

        return view('pembelian/index', $data);
    }

    public function create()
    {
        $this->pembelianModel->save([
            'Tanggal_Pembelian' => $this->request->getVar('tanggal_pembelian'),
            'ID_Supplier' => $this->request->getVar('id_supplier'),
            'ID_Produk' => $this->request->getVar('id_produk'),
            'Jumlah' => $this->request->getVar('jumlah'),
            'Harga_Satuan' => $this->request->getVar('harga_satuan'),
            'Total_Harga' => $this->request->getVar('jumlah') * $this->request->getVar('harga_satuan')
        ]);
        return redirect()->to('/transaksi/pembelian')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['pembelian'] = $this->pembelianModel->find($id);
        $data['supplier'] = $this->supplierModel->findAll();
        $data['produk'] = $this->produkModel->findAll();

        return view('pembelian/edit', $data);
    }

    public function update($id)
    {
        $this->pembelianModel->update($id, [
            'Tanggal_Pembelian' => $this->request->getVar('tanggal_pembelian'),
            'ID_Supplier' => $this->request->getVar('id_supplier'),
            'ID_Produk' => $this->request->getVar('id_produk'),
            'Jumlah' => $this->request->getVar('jumlah'),
            'Harga_Satuan' => $this->request->getVar('harga_satuan'),
            'Total_Harga' => $this->request->getVar('jumlah') * $this->request->getVar('harga_satuan')
        ]);
        return redirect()->to('/transaksi/pembelian')->with('success', 'Pembelian berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pembelianModel->delete($id);
        return redirect()->to('/transaksi/pembelian')->with('success', 'Pembelian berhasil dihapus.');
    }
}
