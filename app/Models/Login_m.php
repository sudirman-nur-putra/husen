<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_m{
    protected $table = 'user';

    public function getData($email, $password){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT * FROM akun WHERE email = '$email' AND password = '$password'");
        return $result->getResultArray();
    }

    // public function getDatae($email){
    //     $db      = \Config\Database::connect();
    //     $result  = $db->query("SELECT * FROM user WHERE email = '$email'");
    //     return $result->getResultArray();
    // }

    // public function simpan($nama, $tanggal, $no, $email, $pass){
    //     $db      = \Config\Database::connect();
    //     $result  = $db->query("INSERT INTO user (nama, tanggal_lahir, no_hp, email, password) VALUES ('$nama','$tanggal', '$no','$email','$pass')");
    //     return $result;
    // }
} 
