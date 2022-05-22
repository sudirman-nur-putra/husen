<?php

namespace App\Controllers;
use App\Models\Home_m;

class Home extends BaseController
{
    public function __construct(){
        $session = \Config\Services::session();
        if ($session->get('id') == FALSE) {
            return redirect()->to('/login');
        }
    }
	// public function __construct(){
	// 	$session = \Config\Services::session();
	// 	if ($session->get('id_user') == "") {
	// 		return view('ui/login.html');
	// 		// return redirect()->to('/login');
	// 	}
	// }
    public function index()
    {
        $session = \Config\Services::session();
        if ($session->get('id') == FALSE) {
            return redirect()->to('/login');
        }
    	$Models = new Home_m;
        // DATA PERUNTUKAN TRANSAKSI BULANAN
        $result['getPenDropBulan'] = $Models->getPenDropBulan();
    	$result['getPenResBulan'] = $Models->getPenResBulan();
        $result['getBarDropBulan'] = $Models->getBarDropBulan();
        $result['getBarResBulan'] = $Models->getBarResBulan();
        $result['getPengOverBulan'] = $Models->getPengOverBulan();
        $result['getPengPemBulan'] = $Models->getPengPemBulan();
        $result['getPengGajiBulan'] = $Models->getPengGajiBulan();

        // DATA PERUNTUKAN TRANSAKSI HARIAN
        $result['getPenDropHari'] = $Models->getPenDropHari();
        $result['getPenResHari'] = $Models->getPenResHari();
        $result['getBarDropHari'] = $Models->getBarDropHari();
        $result['getBarResHari'] = $Models->getBarResHari();
        $result['getPengOverHari'] = $Models->getPengOverHari();
        $result['getPengPemHari'] = $Models->getPengPemHari();
        $result['getPengGajiHari'] = $Models->getPengGajiHari();

        // DATA PERUNTUKAN TRANSAKSI TAHUNAN
        $result['getPenDropTahun'] = $Models->getPenDropTahun();
        $result['getPenResTahun'] = $Models->getPenResTahun();
        $result['getBarDropTahun'] = $Models->getBarDropTahun();
        $result['getBarResTahun'] = $Models->getBarResTahun();
        $result['getPengOverTahun'] = $Models->getPengOverTahun();
        $result['getPengPemTahun'] = $Models->getPengPemTahun();
        $result['getPengGajiTahun'] = $Models->getPengGajiTahun();
        
        // DATA PERUNTUKAN DATA ADMIN, DAN DROPSHIPPER
        $result['getUser'] = $Models->getUser();
        
        // DATA PERUNTUKAN CHART PENGELUARAN BARANG
        $result['getBarDropTahunBulan'] = $Models->getBarDropTahunBulan();
        $result['getBarResTahunBulan'] = $Models->getBarResTahunBulan();
        $result['getBarDropTahunBulanLalu'] = $Models->getBarDropTahunBulanLalu();
        $result['getBarResTahunBulanLalu'] = $Models->getBarResTahunBulanLalu();

        // DATA CHART PENDAPATAN
        $result['getPenDropTahunBulan'] = $Models->getPenDropTahunBulan();
        $result['getPenResTahunBulan'] = $Models->getPenResTahunBulan();

        // // DATA CHART PENGELUARAN
        $result['getPengOverTahunBulan'] = $Models->getPengOverTahunBulan();
        $result['getPengPemTahunBulan'] = $Models->getPengPemTahunBulan();
        $result['getPengGajiTahunBulan'] = $Models->getPengGajiTahunBulan();

        // var_dump( $result['getPenDropBulan']);
        return view('ui/dashboard.php', $result);
    }
}
