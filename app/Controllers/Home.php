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
        $result['getPenDropBulan'] = $Models->getPenDropBulan();
    	$result['getPenResBulan'] = $Models->getPenResBulan();
        $result['getBarDropBulan'] = $Models->getBarDropBulan();
        $result['getBarResBulan'] = $Models->getBarResBulan();
        $result['getPengOverBulan'] = $Models->getPengOverBulan();
        $result['getPengPemBulan'] = $Models->getPengPemBulan();
        $result['getUser'] = $Models->getUser();
        $result['getBarDropTahunBulan'] = $Models->getBarDropTahunBulan();
        $result['getBarResTahunBulan'] = $Models->getBarResTahunBulan();

        return view('ui/dashboard.php', $result);
    }
}
