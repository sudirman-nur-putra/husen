<?php namespace App\Models;

use CodeIgniter\Model;

class SellerDropship_Model extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'nomor_hp',
        'level',
    ];

    public function fetch_data(){
        return $this->findAll();
    }
    public function getReseller(){
        $result  = $this->query("SELECT nama,nomor_hp FROM user WHERE level = 'Reseller' ");
        return $result->getResultArray();
    }
    public function getDropshipper(){
        $result  = $this->query("SELECT nama,nomor_hp FROM user WHERE level = 'Dropshipper' ");
        return $result->getResultArray();
    }
    public function countDropshipper(){
        $result  = $this->query("SELECT COUNT(*) as total FROM user WHERE level = 'Dropshipper' ");
        return $result->getRowArray();
    }
  
}
?>