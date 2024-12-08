<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\PembelianModel;

class Supplier extends BaseController
{
    protected $supplierModel;
    protected $pembelianModel;


    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
        $this->pembelianModel = new PembelianModel();
    }

    public function index()
    {
        $data['supplier'] = $this->supplierModel->findAll();
        return view('supplier/index', $data);
    }

    public function create()
    {
        $this->supplierModel->save([
            'Nama_Supplier' => $this->request->getVar('nama_supplier'),
            'Alamat_Supplier' => $this->request->getVar('alamat_supplier'),
            'Telepon_Supplier' => $this->request->getVar('telepon_supplier'),
        ]);
        return redirect()->to('/produk/supplier')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['supplier'] = $this->supplierModel->find($id);
        return view('supplier/edit', $data);
    }

    public function update($id)
    {
        $this->supplierModel->update($id, [
            'Nama_Supplier' => $this->request->getVar('nama_supplier'),
            'Alamat_Supplier' => $this->request->getVar('alamat_supplier'),
            'Telepon_Supplier' => $this->request->getVar('telepon_supplier'),
        ]);
        return redirect()->to('/produk/supplier')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pembelianModel->where('ID_Supplier', $id)->delete();

        $this->supplierModel->delete($id);
        return redirect()->to('/produk/supplier')->with('success', 'Supplier berhasil dihapus.');
    }
}
