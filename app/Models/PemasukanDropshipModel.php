<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanDropshipModel extends Model
{
    protected $table = 'transaksi_dropshipper';
    protected $allowedFields = [
        'id',
        'id_user',
        'id_barang',
        'tanggal',
        'modal',
        'jumlah_barang',
        'harga_jual',
        'no_resi',
        'status_packing',
        'marketplace',
        'status',
    ];
    public function fetch_data()
    {
        return $this->findAll();
    }
    public function getTransaksiDropship()
    {
        $result  = $this->query("SELECT transaksi_dropshipper.id, user.nama, transaksi_dropshipper.tanggal, transaksi_dropshipper.no_resi, barang.nama_barang, transaksi_dropshipper.jumlah_barang, transaksi_dropshipper.harga_jual, transaksi_dropshipper.modal,
        transaksi_dropshipper.marketplace, transaksi_dropshipper.status
        FROM  transaksi_dropshipper
        INNER JOIN barang ON transaksi_dropshipper.id_barang = barang.id
        INNER JOIN user ON transaksi_dropshipper.id_user = user.id;");
        return $result->getResultArray();
    }

    public function getTransDropship($id)
    {
        $result = $this->query("SELECT * FROM transaksi_dropshipper WHERE id = '$id'");
        return $result->getResultArray();
    }
}
