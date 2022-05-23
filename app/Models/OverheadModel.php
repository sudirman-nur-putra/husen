<?php

namespace App\Models;

use CodeIgniter\Model;

class OverheadModel extends Model
{
    protected $table = 'overhead';
    protected $allowedFields = [
        'id',
        'tanggal',
        'keterangan',
        'jumlah_pengeluaran',
    ];
    public function fetch_data()
    {
        return $this->findAll();
    }

    public function getOverhead($id)
    {
        $result = $this->query("SELECT * FROM overhead WHERE id = '$id'");
        return $result->getResultArray();
    }
}
