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
}
