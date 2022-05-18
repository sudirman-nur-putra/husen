<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianBarangModel extends Model
{
    protected $table = 'pembelian_barang';
    protected $allowedFields = [
        'id_barang',
        'nama_toko',
        'jumlah_beli',
        'harga',
        'total_harga',
        'tanggal',
    ];
    public function fetch_data()
    {
        return $this->findAll();
    }
}
