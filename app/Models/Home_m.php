<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_m{
    
    // get pendapatanb dropshipper perbulan
    public function getPenDropBulan(){
        $db      = \Config\Database::connect();
        // $result = $db->query("SELECT SUM(harga_jual) FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y-%m') == '$tanggal'");

        $result  = $db->query("SELECT SUM(harga_jual) as harga, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_dropshipper GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }
    // get pendapatanb Reseller perbulan
    public function getPenResBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(total_pembelian) as harga, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_reseller GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }


    // get jumlah barang keluar Dropshipper perbulan
    public function getBarDropBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_dropshipper GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller perbulan
    public function getBarResBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_reseller GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }


    //GET Pengeluaran overhaed
    public function getPengOverBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM overhead GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }
    //GET Pengeluaran pembelian
    public function getPengPemBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(total_harga) as pengeluaran, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM pembelian_barang GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 1");
        return $result->getResultArray();
    }


    // GET Tabel Data User
    public function getUser(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT * FROM user");
        return $result->getResultArray();
    }

    // get jumlah barang keluar Dropshipper perbulan
    public function getBarDropTahunBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_dropshipper GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 12");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller perbulan
    public function getBarResTahunBulan(){
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) as tanggal FROM transaksi_reseller GROUP BY YEAR(tanggal), MONTH(tanggal) DESC LIMIT 12");
        return $result->getResultArray();
    }
} 
