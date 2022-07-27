<?php

namespace App\Controllers;

use \App\Models\User_Model;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function login()
    {
        $user = new User_Model();
        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));

        $cek_user = $user->where('username', $username)->first();
        if ($cek_user) {
            if (password_verify($password, $cek_user['password'])) {
                session()->set([
                    'username'  => $cek_user['username'],
                    'id_level'  => $cek_user['id_level'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('dashboard'));
            } else {
                echo "password anda salah";
            }
        } else {
            echo "Username Tidak Ditemukan";
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect('/');
    }
}
