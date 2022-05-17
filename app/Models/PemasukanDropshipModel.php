<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanDropshipModel extends Model
{
    protected $table = 'transaksi_dropshipper';
    protected $allowedFields = [
        'id_user',
        'id_barang',
        'tanggal',
        'modal',
        'jumlah_barang',
        'harga_jual',
        'no resi',
        'status_packing',
        'marketplace',
        'status',
    ];
    public function fetch_data()
    {
        return $this->findAll();
    }
}
