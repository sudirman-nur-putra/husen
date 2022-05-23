<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianBarangModel extends Model
{
    protected $table = 'pembelian_barang';
    protected $allowedFields = [
        'id',
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
    public function getNamaBarang()
    {
        $result  = $this->query("SELECT pembelian_barang.id, pembelian_barang.tanggal, pembelian_barang.nama_toko, barang.nama_barang, pembelian_barang.jumlah_beli, pembelian_barang.harga, pembelian_barang.total_harga
        FROM pembelian_barang
        INNER JOIN barang
        ON pembelian_barang.id_barang = barang.id;");
        return $result->getResultArray();
    }
}
