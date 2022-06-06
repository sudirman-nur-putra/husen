<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'gaji';
    protected $allowedFields = [
        'id',
        'id_user',
        'tanggal',
        'nominal',
    ];

    public function fetch_data()
    {
        return $this->findAll();
    }

    public function getGaji()
    {
        $result  = $this->query("SELECT gaji.id, user.nama,  gaji.tanggal, gaji.nominal
        FROM  gaji
        INNER JOIN user ON gaji.id_user = user.id;");
        return $result->getResultArray();
    }
}
