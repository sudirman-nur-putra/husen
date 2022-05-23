<?php

namespace App\Models;

use CodeIgniter\Model;

class SellerDropship_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'nomor_hp',
        'keuntungan',
        'level',
    ];

    public function fetch_data()
    {
        return $this->findAll();
    }
    public function getReseller()
    {
        $result  = $this->query("SELECT id,nama,nomor_hp FROM user WHERE level = 'Reseller' ");
        return $result->getResultArray();
    }
    public function getDropshipper()
    {
        $result  = $this->query("SELECT id,nama,nomor_hp, keuntungan FROM user WHERE level = 'Dropshipper' ");
        return $result->getResultArray();
    }
    public function countDropshipper()
    {
        $result  = $this->query("SELECT COUNT(*) as total FROM user WHERE level = 'Dropshipper' ");
        return $result->getRowArray();
    }
    public function sumDropshipper()
    {
        $result  = $this->query("SELECT SUM(harga_jual - modal) as total_gaji FROM transaksi_dropshipper where tanggal between '2022-05-01' and '2022-05-31' ");
        return $result->getRowArray();
    }
    public function sumDropshipperTahun()
    {
        $result  = $this->query("SELECT SUM(harga_jual - modal) as total_gaji_tahun FROM transaksi_dropshipper where tanggal between '2022-01-01' and '2022-12-31' ");
        return $result->getRowArray();
    }
    public function sumDropshipperHari()
    {
        $result  = $this->query("SELECT SUM(harga_jual - modal) as total_gaji_hari FROM transaksi_dropshipper where tanggal between '2022-05-16' and '2022-05-16' ");
        return $result->getRowArray();
    }
}
