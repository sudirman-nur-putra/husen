<?php

namespace App\Controllers;

use App\Models\Login_m;

class Login extends BaseController
{

	public function __construct()
	{

		// $session = \Config\Services::session($config);
		// session_start();
	}
	public function index()
	{
		$session = \Config\Services::session();
		if ($session->get('id_user') == "") {
			return view('ui/login');
			// return redirect()->to('/login');
		} else {
			// echo $session->get('id_user');
			return redirect()->to('/home');
			// return view('user/login');
		}
		// $data = ['nama' => 'Sudirman Nur Putra', 'kelas' => 'ilkom c1' ];
		// $session->set($data);
		// if($session->get('level') != 3){
		// 	echo "berhasil memasuki pengecekan";
		// }
		// echo 'Halaman Login '.$session->get('nama').$session->get('kelas');
		// return view('welcome_message');
	}

	public function masuk()
	{
		$session = \Config\Services::session();
		$login = new Login_m;
		if ($this->request->getMethod() === 'post' && $this->validate([
			'email' => 'required',
			'pass' => 'required'
		])) {
			$email = $this->request->getVar('email');
			$pass = sha1($this->request->getVar('pass'));
			$data = $login->getData($email, $pass);
			if (count($data) == 1) {
				foreach ($data as $row) {
					$data = [
						'id_user' => $row['id_user'],
						'nama' => $row['nama'],
						'email' => $row['email'],
						'level' => 3
					];
				}
				$session->set($data);
				return redirect()->to('/home');
			} else {
				return view('ui/login');
			}
			# code...
		} else {
			return view('ui/login');
			# code...
		}
	}
	public function logout()
	{
		$session = \Config\Services::session();
		$data = ['level'];
		$session->remove($data);
		return redirect()->to('/login');
	}
	//--------------------------------------------------------------------

}
