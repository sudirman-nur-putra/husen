<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_m{
    
    // get pendapatanb dropshipper perbulan
    public function getPenDropBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');

        $result  = $db->query("SELECT SUM(harga_jual) as harga FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }
    // get pendapatanb Reseller perbulan
    public function getPenResBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(total_pembelian) as harga FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }


    // get jumlah barang keluar Dropshipper perbulan
    public function getBarDropBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller perbulan
    public function getBarResBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }


    //GET Pengeluaran overhaed
    public function getPengOverBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran FROM overhead WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }
    //GET Pengeluaran pembelian
    public function getPengPemBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(total_harga) as pengeluaran FROM pembelian_barang WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
        return $result->getResultArray();
    }
    //GET Pengeluaran Gaji
    public function getPengGajiBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(nominal) as pengeluaran FROM gaji WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal'");
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
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, tanggal FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY  MONTH(tanggal)");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller perbulan
    public function getBarResTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, tanggal FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Dropshipper perbulan Tahun lalu
    public function getBarDropTahunBulanLalu(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y') - 1;
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, tanggal FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY  MONTH(tanggal)");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller perbulan tahun lalu
    public function getBarResTahunBulanLalu(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y') - 1;
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang, tanggal FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }


    // get pendapatanb dropshipper hari ini
    public function getPenDropHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');

        $result  = $db->query("SELECT SUM(harga_jual) as harga FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal' ");
        return $result->getResultArray();
    }
     // get pendapatanb Reseller hari ini
    public function getPenResHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(total_pembelian) as harga FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }


    // get jumlah barang keluar Dropshipper hari ini
    public function getBarDropHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller hari ini
    public function getBarResHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }


    //GET Pengeluaran overhaed  hari ini
    public function getPengOverHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran FROM overhead WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }
    //GET Pengeluaran pembelian hari ini
    public function getPengPemHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(total_harga) as pengeluaran FROM pembelian_barang WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }
    public function getPengGajiHari(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(nominal) as pengeluaran FROM gaji WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal'");
        return $result->getResultArray();
    }

    // TAHUNAN
    // get pendapatanb dropshipper Tahun Ini
    public function getPenDropTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');

        $result  = $db->query("SELECT SUM(harga_jual) as harga FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' ");
        return $result->getResultArray();
    }
     // get pendapatanb Reseller tahun ini
    public function getPenResTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(total_pembelian) as harga FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }


    // get jumlah barang keluar Dropshipper Tahun ini
    public function getBarDropTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }
    // get jumlah barang keluar Reseller tahun ini
    public function getBarResTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_barang) as barang FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }


    //GET Pengeluaran overhaed  tahun ini
    public function getPengOverTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran FROM overhead WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }
    //GET Pengeluaran pembelian tahun ini
    public function getPengPemTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(total_harga) as pengeluaran FROM pembelian_barang WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }
    public function getPengGajiTahun(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(nominal) as pengeluaran FROM gaji WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal'");
        return $result->getResultArray();
    }


    // get pendapatanb dropshipper perbulan
    public function getPenDropTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');

        $result  = $db->query("SELECT SUM(harga_jual) as harga, tanggal FROM transaksi_dropshipper WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal) ");
        return $result->getResultArray();
    }
    // get pendapatanb Reseller perbulan
    public function getPenResTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(total_pembelian) as harga, tanggal FROM transaksi_reseller WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }

    //GET Pengeluaran overhaed
    public function getPengOverTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(jumlah_pengeluaran) as pengeluaran, tanggal FROM overhead WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }
    //GET Pengeluaran pembelian
    public function getPengPemTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(total_harga) as pengeluaran, tanggal FROM pembelian_barang WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }
    //GET Pengeluaran Gaji
    public function getPengGajiTahunBulan(){
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(nominal) as pengeluaran, tanggal FROM gaji WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' GROUP BY MONTH(tanggal)");
        return $result->getResultArray();
    }
} 
