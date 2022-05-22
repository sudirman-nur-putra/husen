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
    public function index($chart="", $tahun="")
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
        
        if ($chart == "barang") {
            $tgl1 = $tahun;
        }else{
            $tgl1 = date('Y');
        }
        // DATA PERUNTUKAN CHART PENGELUARAN BARANG
        $result['getBarDropTahunBulan'] = $Models->getBarDropTahunBulan($tgl1);
        $result['getBarResTahunBulan'] = $Models->getBarResTahunBulan($tgl1);
     
        // KONDISI SORTING TAHUN CHART PEMASUKAN
        if ($chart == "pemasukan") {
            $tgl2 = $tahun;
        }else{
            $tgl2 = date("Y");
        }
        // DATA CHART PENDAPATAN
        $result['getPenDropTahunBulan'] = $Models->getPenDropTahunBulan($tgl2);
        $result['getPenResTahunBulan'] = $Models->getPenResTahunBulan($tgl2);


        // SORTING TAHUN UNTUK CHART PENGELUARAN
        if ($chart == "pengeluaran") {
            $tgl3 = $tahun;
        }else{
            $tgl3 = date("Y");
        }
        // // DATA CHART PENGELUARAN
        $result['getPengOverTahunBulan'] = $Models->getPengOverTahunBulan($tgl3);
        $result['getPengPemTahunBulan'] = $Models->getPengPemTahunBulan($tgl3);
        $result['getPengGajiTahunBulan'] = $Models->getPengGajiTahunBulan($tgl3);

        $result['tahun1'] = $tgl1;
        $result['tahun2'] = $tgl2;
        $result['tahun3'] = $tgl3;

        // var_dump( $result['getPenDropBulan']);
        return view('ui/dashboard.php', $result);
    }
    public function chart($chart, $tahun){
        echo $chart."<br>";
        echo $tahun."<br>";
    }
}
