<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemasukan_Model extends Model
{
    protected $table = 'transaksi_reseller';
    protected $allowedFields = [
        'id_user',
        'id_barang',
        'tanggal',
        'jumlah_barang',
        'harga',
        'total_pembelian',
    ];

    public function fetch_data()
    {
        return $this->findAll();
    }
    public function getTransaksiReseller()
    {
        $result  = $this->query("SELECT user.nama, transaksi_reseller.tanggal, barang.nama, transaksi_reseller.jumlah_barang, transaksi_reseller.harga, transaksi_reseller.total_pembelian 
        FROM  transaksi_reseller
        INNER JOIN barang ON transaksi_reseller.id_barang = barang.id
        INNER JOIN user ON transaksi_reseller.id_user = user.id;");
        return $result->getResultArray();
    }
}
