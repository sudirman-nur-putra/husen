<?php namespace App\Models;

use CodeIgniter\Model;

class DataBarang_Model extends Model{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'harga_beli',
        'harga_jual_dropshipper',
        'harga_jual_reseller',
        'stok',
    ];
    public function fetch_data(){
        return $this->findAll();
    }
}
?>