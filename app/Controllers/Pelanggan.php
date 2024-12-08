<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        $data = [
            'Nama' => $this->request->getPost('nama'),
            'Email' => $this->request->getPost('email'),
            'Alamat' => $this->request->getPost('alamat'),
            'No_tlp' => $this->request->getPost('no_tlp')
        ];

        $this->pelangganModel->insert($data);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $pelanggan = $this->pelangganModel->find($id);

            if ($pelanggan) {
                return $this->response->setJSON($pelanggan);
            } else {
                return $this->response->setJSON(['error' => 'Data tidak ditemukan'])->setStatusCode(404);
            }
        } else {
            // Jika bukan request AJAX, arahkan ke halaman 404 atau tindakan lain
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function update($id)
    {
        $data = [
            'Nama' => $this->request->getPost('nama'),
            'Email' => $this->request->getPost('email'),
            'Alamat' => $this->request->getPost('alamat'),
            'No_tlp' => $this->request->getPost('no_tlp'),
        ];

        $this->pelangganModel->update($id, $data);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
