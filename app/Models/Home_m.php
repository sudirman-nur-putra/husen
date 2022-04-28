<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_m{
     protected static $db= \Config\Database::connect();
    
    public function getJumlahPendapatan(){
        $result  = $db->query("SELECT count(total_pendapatan) FROM pendapatan_harian");
        return $result->getResultArray();
    }

    public function getJumlahBarang(){
        $result  = $db->query("SELECT count(jml_barang) FROM transaksi");
        return $result->getResultArray();
    }
     
    public function getTotalPengeluaran(){
        $result  = $db->query("SELECT count(total_pengeluaran) FROM pengeluaran");
        return $result->getResultArray();
    }

    public function getPendapatanHarian(){
        $result  = $db->query("SELECT tanggal, total_pendapatan FROM pendapatan_harian");
        return $result->getResultArray(); 
    }
} 
