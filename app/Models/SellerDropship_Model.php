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
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT id,nama,nomor_hp FROM user WHERE level = 'Reseller' ");
        return $result->getResultArray();
    }
    public function getDropshipper()
    {
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT id,nama,nomor_hp,keuntungan FROM user WHERE level = 'Dropshipper' ");
        return $result->getResultArray();
    }
    public function getDropshipperKeuntungan()
    {
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT nama,nomor_hp, (harga_jual - modal) as total_gaji FROM user RIGHT JOIN transaksi_dropshipper ON user.id = transaksi_dropshipper.id_user WHERE level = 'Dropshipper' ");
        return $result->getResultArray();
    }
    public function countDropshipper()
    {
        $db      = \Config\Database::connect();
        $result  = $db->query("SELECT COUNT(*) as total FROM user WHERE level = 'Dropshipper' ");
        return $result->getRowArray();
    }
    public function sumDropshipper()
    {   
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m');
        $result  = $db->query("SELECT SUM(harga_jual - modal) as total_gaji FROM transaksi_dropshipper JOIN user ON transaksi_dropshipper.id_user = user.id WHERE DATE_FORMAT(tanggal,'%Y-%m') = '$tanggal' ");
        return $result->getResultArray();
    }
    public function sumDropshipperTahun()
    {
        $db      = \Config\Database::connect();
        $tanggal = date('Y');
        $result  = $db->query("SELECT SUM(harga_jual - modal) as total_gaji FROM transaksi_dropshipper JOIN user ON transaksi_dropshipper.id_user = user.id WHERE DATE_FORMAT(tanggal,'%Y') = '$tanggal' ");
        return $result->getResultArray();
    }
    public function sumDropshipperHari()
    {
        $db      = \Config\Database::connect();
        $tanggal = date('Y-m-d');
        $result  = $db->query("SELECT SUM(harga_jual - modal) as total_gaji FROM transaksi_dropshipper JOIN user ON transaksi_dropshipper.id_user = user.id  WHERE DATE_FORMAT(tanggal,'%Y-%m-%d') = '$tanggal' ");
        return $result->getResultArray();
    }
}
