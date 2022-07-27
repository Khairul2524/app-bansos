<?php

namespace App\Controllers;

use \App\Models\Kriteria_Model;

class Kriteria extends BaseController
{
    public function index()
    {
        $kriteria = new Kriteria_Model();
        $data['kriteria'] = $kriteria->findAll();
        echo view('kriteria/index', $data);
    }
    public function tambah()
    {
        $kriteria = new Kriteria_Model();
        $kriteria->insert([
            'kriteria' => htmlspecialchars($this->request->getPost('kriteria')),
            'jenis' => htmlspecialchars($this->request->getPost('jenis')),
            'bobot' => htmlspecialchars($this->request->getPost('bobot')),
        ]);
        return redirect('kriteria');
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $kriteria = new Kriteria_Model();
        $data['kriteria'] = $kriteria->where('id_kriteria', $id)->first();
        echo json_encode($data['kriteria']);
    }
    public function update()
    {
        $kriteria = new Kriteria_Model();
        $kriteria->update(htmlspecialchars($this->request->getPost('id')), [
            'kriteria' => htmlspecialchars($this->request->getPost('kriteria')),
            'jenis' => htmlspecialchars($this->request->getPost('jenis')),
            'bobot' => htmlspecialchars($this->request->getPost('bobot')),
        ]);
        return redirect('kriteria');
    }
    public function hapus($id)
    {
        $kriteria = new Kriteria_Model();
        $kriteria->delete($id);
        return redirect('kriteria');
    }
}
