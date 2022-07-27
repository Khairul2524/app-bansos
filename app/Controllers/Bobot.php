<?php

namespace App\Controllers;

use \App\Models\Bobot_Model;
use \App\Models\Kriteria_Model;

class Bobot extends BaseController
{
    public function index()
    {
        // echo "oke";
        $kriteria = new Kriteria_Model();
        $bobot = new Bobot_Model();
        $data['kriteria'] = $kriteria->findAll();
        $data['bobot'] = $bobot->join('kriteria', 'kriteria.id_kriteria=bobot.id_kriteria')->findAll();
        // // var_dump($data['bobot']);
        // // die;
        echo view('bobot/index', $data);
    }
    public function tambah()
    {
        $bobot = new Bobot_Model();
        $bobot->insert([
            'nilai' => htmlspecialchars($this->request->getPost('nilai')),
            'keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
            'id_kriteria' => htmlspecialchars($this->request->getPost('kriteria'))
        ]);
        // echo $kiteria->insertID();
        // die;
        return redirect('bobot');
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $bobot = new Bobot_Model();
        $data['bobot'] = $bobot->where('id_bobot', $id)->first();
        echo json_encode($data['bobot']);
    }
    public function update()
    {
        $bobot = new bobot_Model();
        $bobot->update(htmlspecialchars($this->request->getPost('id')), [
            'nilai' => htmlspecialchars($this->request->getPost('nilai')),
            'keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
            'id_kriteria' => htmlspecialchars($this->request->getPost('kriteria'))
        ]);
        return redirect('bobot');
    }
    public function hapus($id)
    {
        $bobot = new bobot_Model();
        $bobot->delete($id);
        return redirect('bobot');
    }
}
