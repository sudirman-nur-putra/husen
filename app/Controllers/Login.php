<?php namespace App\Controllers;

use App\Models\Login_m;

class Login extends BaseController {
	
	public function __construct(){
		
	}
	// index untuk mesuk ke halaman login
	public function index() {
		$session = \Config\Services::session();

		echo $session->get('id');
		// cek status login berdasarkan session
		if ($session->get('id') == FALSE) {
			return view('ui/login.php');
		}else{
			return redirect()->to('/home');
		}
	}

	// proses masuk
	public function masuk(){

		$session = \Config\Services::session();
		$login = new Login_m;
			
			// inisialisasi
			$email = $this->request->getVar('email');
			$pass = MD5($this->request->getVar('password'));
			
			// cek data
			$data = $login->getData($email, $pass);
			if (count($data) == 1) {
				// menyimpan data ke session
				foreach ($data as $row){
					$data1 = [
						'id' => $row['id'],
						'email' => $row['email']
					];
				}

				$session->set($data1);
				var_dump($data1);
				return redirect()->to('/home');
			}else{
				// pesan jika data tidak ditemukan
				$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
				return view('ui/login', $data);
			}
			// code...
		
		
	}
	// menghapus session = keluar
	public function logout(){
		$session = \Config\Services::session();
		$data = ['id'];
		// menghapus session
		$session->remove($data);
		return redirect()->to('/login');
	}
	//--------------------------------------------------------------------

}
