<?php

namespace App\Controllers;

use \App\Models\level_Model;
use \App\Models\user_Model;

class User extends BaseController
{
    public function index()
    {
        $level = new Level_Model();
        $user = new User_Model();
        $data['level'] = $level->findAll();
        $data['user'] = $user->join('level', 'level.id_level=user.id_level')->findAll();
        // var_dump($data['user']);
        // die;
        echo view('user/index', $data);
    }
    public function tambah()
    {
        $level = new User_Model();
        $level->insert([
            'username' => htmlspecialchars($this->request->getPost('username')),
            'password' => password_hash(htmlspecialchars($this->request->getPost('password')), PASSWORD_DEFAULT),
            'id_level' => htmlspecialchars($this->request->getPost('level'))
        ]);
        // echo $level->insertID();
        // die;
        return redirect('user');
    }
    public function ubah()
    {
        $id = $this->request->getPost('id');
        $user = new User_Model();
        $data['user'] = $user->where('id_user', $id)->first();
        echo json_encode($data['user']);
    }
    public function update()
    {
        $user = new User_Model();
        $user->update(htmlspecialchars($this->request->getPost('id')), [
            'username' => htmlspecialchars($this->request->getPost('username')),
            'password' => password_hash(htmlspecialchars($this->request->getPost('password')), PASSWORD_DEFAULT),
            'id_level' => htmlspecialchars($this->request->getPost('level'))
        ]);
        return redirect('user');
    }
    public function hapus($id)
    {
        $user = new User_Model();
        $user->delete($id);
        return redirect('user');
    }
}
