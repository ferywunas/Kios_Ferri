<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PenjualanModel;
use App\Models\PelangganModel;

class Pembayaran extends BaseController
{
    protected $pembayaranModel;
    protected $penjualanModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $pembayaranModel = new PembayaranModel();
        $penjualanModel = new PenjualanModel();

        $data['pembayaran'] = $pembayaranModel->findAll();
        $data['penjualan'] = $penjualanModel->getPenjualanWithPelanggan(); // Ambil data penjualan dengan nama pelanggan

        return view('pembayaran/index', $data);
    }

    public function create()
    {
        $data = [
            'ID_Penjualan' => $this->request->getPost('ID_Penjualan'),
            'Metode_Pembayaran' => $this->request->getPost('Metode_Pembayaran'),
            'Status_Pembayaran' => $this->request->getPost('Status_Pembayaran'),
        ];

        $this->pembayaranModel->insert($data);
        return redirect()->to('/transaksi/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['pembayaran'] = $this->pembayaranModel->find($id);
        $data['penjualan'] = $this->penjualanModel->findAll(); // Ambil semua penjualan untuk dropdown
        return view('/pembayaran/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'ID_Penjualan' => $this->request->getPost('ID_Penjualan'),
            'Metode_Pembayaran' => $this->request->getPost('Metode_Pembayaran'),
            'Status_Pembayaran' => $this->request->getPost('Status_Pembayaran'),
        ];

        $this->pembayaranModel->update($id, $data);
        return redirect()->to('/transaksi/pembayaran')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pembayaranModel->delete($id);
        return redirect()->to('/transaksi/pembayaran')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
