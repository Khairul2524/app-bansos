<?php

namespace App\Controllers;

use \App\Models\Penduduk_Model;
use \App\Models\Kriteria_Model;
use \App\Models\Bobot_Model;
use \App\Models\Bantuan_Model;

class Penduduk extends BaseController
{
    public function index()
    {
        $penduduk = new Penduduk_Model();
        $data['penduduk'] = $penduduk->findAll();
        // dd($data['penduduk']);
        // die;
        echo view('penduduk/index', $data);
    }
    public function tambah()
    {
        $penduduk = new Penduduk_Model();
        $bantuan = new Bantuan_Model();
        $penduduk->insert([
            'nama' => htmlspecialchars($this->request->getPost('nama')),
            'jenis_kelamin' => htmlspecialchars($this->request->getPost('jenis_k')),
            'no_kk' => htmlspecialchars($this->request->getPost('no_kk')),
            'alamat' => htmlspecialchars($this->request->getPost('alamat')),
            'agama' => htmlspecialchars($this->request->getPost('agama')),
            'status_perkawinan' => htmlspecialchars($this->request->getPost('status_kawin')),
        ]);
        // echo $level->insertID();
        // die;
        $result = array();
        foreach ($this->request->getPost('kriteria') as $key => $val) {
            $result[] = array(
                'id_penduduk' => $penduduk->insertID(),
                'id_kriteria' => htmlspecialchars($this->request->getPost('kriteria')[$key]),
                'id_bobot' => htmlspecialchars($this->request->getPost('bobot')[$key])
            );
        }
        $bantuan->insertBatch($result);
        return redirect('penduduk');
    }
    public function form()
    {
        $kriteria = new Kriteria_Model();
        $bobot = new Bobot_Model();
        $data['kriteria'] = $kriteria->findAll();
        $data['bobot'] = $bobot->findAll();
        echo view('penduduk/form', $data);
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $penduduk = new Penduduk_Model();
        $data['penduduk'] = $penduduk->where('id_penduduk', $id)->first();
        echo json_encode($data['penduduk']);
    }
    public function update()
    {
        $penduduk = new Penduduk_Model();
        $penduduk->update(htmlspecialchars($this->request->getPost('id')), [
            'nama' => htmlspecialchars($this->request->getPost('nama')),
            'jenis_kelamin' => htmlspecialchars($this->request->getPost('jenis_k')),
            'no_kk' => htmlspecialchars($this->request->getPost('no_kk')),
            'alamat' => htmlspecialchars($this->request->getPost('alamat')),
            'agama' => htmlspecialchars($this->request->getPost('agama')),
            'status_perkawinan' => htmlspecialchars($this->request->getPost('status_kawin')),
        ]);
        return redirect('penduduk');
    }
    public function hapus($id)
    {
        $penduduk = new Penduduk_Model();
        $penduduk->delete($id);
        return redirect('penduduk');
    }
}
