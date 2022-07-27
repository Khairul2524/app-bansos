<?php

namespace App\Controllers;

use \App\Models\Penududuk_Model;
use \App\Models\Bobot_Model;
use \App\Models\Kriteria_Model;
use \App\Models\Bantuan_Model;
use App\Models\Penduduk_Model;
use PhpParser\Node\Expr\New_;

class Perhitungan extends BaseController
{
    public function index()
    {
        $penduduk = new Penduduk_Model();
        $kriteria = new Kriteria_Model();
        $bantuan = new Bantuan_Model();
        $bobot = new Bobot_Model();
        $data['kriteria'] = $kriteria->findAll();
        $data['penduduk'] = $penduduk->findAll();
        // $data['penduduk_kriteria'] = $penduduk->join('bantuan', 'bantuan.id_penduduk=penduduk.id_penduduk')->findAll();
        $data['bobot'] = $bobot->findAll();
        $data['bantuan'] = $bantuan->findAll();
        $data['all'] = $bantuan->join('kriteria', 'kriteria.id_kriteria=bantuan.id_kriteria')->join('bobot', 'bobot.id_bobot=bantuan.id_bobot')->findAll();
        // dd($data['all']);
        // dd($data['penduduk']);
        // dd($data['pendudukkrite']);
        return view('perhitungan/aras', $data);
    }
}
