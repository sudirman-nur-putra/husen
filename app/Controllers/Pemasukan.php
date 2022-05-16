<?php

namespace App\Controllers;

use App\Models\DataBarang_Model;
use App\Models\SellerDropship_Model;

class Pemasukan extends BaseController
{
    public function index()
    {
        return view('ui/pemasukan');
    }
    public function formtransaksireseller()
    {
        $sellerdropship = new SellerDropship_Model;
        $databarang = new DataBarang_Model();
        $data['reseller'] = $sellerdropship->getReseller();
        $data['barang'] = $databarang->fetch_data();
        //$data['dropshipper'] = $sellerdropship->getDropshipper();
        return view('ui/form_reseller', $data);
    }
    public function formtranskasidropshipper()
    {
        $sellerdropship = new SellerDropship_Model;
        $databarang = new DataBarang_Model();
        //$data['reseller'] = $sellerdropship->getReseller();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['barang'] = $databarang->fetch_data();
        return view('ui/form_dropshipper', $data);
    }
    public function tambahtransaksireseller()
    {
        dd($this->request->getVar());
    }
}
