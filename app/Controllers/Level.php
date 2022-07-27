<?php

namespace App\Controllers;

use \App\Models\level_Model;

class Level extends BaseController
{
    public function index()
    {
        $level = new Level_Model();
        $data['level'] = $level->findAll();
        echo view('level/index', $data);
    }
    public function tambah()
    {
        $level = new Level_Model();
        $level->insert([
            'level' => htmlspecialchars($this->request->getPost('level')),
        ]);
        return redirect('level');
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $level = new Level_Model();
        $data['level'] = $level->where('id_level', $id)->first();
        echo json_encode($data['level']);
    }
    public function update()
    {
        $level = new Level_Model();
        $level->update(htmlspecialchars($this->request->getPost('id')), [
            'level' => htmlspecialchars($this->request->getPost('level')),
        ]);
        return redirect('level');
    }
    public function hapus($id)
    {
        $level = new Level_Model();
        $level->delete($id);
        return redirect('level');
    }
}
