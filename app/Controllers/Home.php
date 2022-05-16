<?php

namespace App\Controllers;

use App\Models\Home_m;

class Home extends BaseController
{
    public function index()
    {
        $Models = new Home_m;
        $result['pendapatan'] = $Models->getJumlahPendapatan();
        $result['barang'] = $Models->getJumlahBarang();
        //$result['pengeluaran'] = $Models->getJumlahPengaluaran();
        $result['harian'] = $Models->getPendapatanHarian();
        return view('ui/index', $result);
    }
}
