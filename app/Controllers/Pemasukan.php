<?php

namespace App\Controllers;

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
        $data['reseller'] = $sellerdropship->getReseller();
        //$data['dropshipper'] = $sellerdropship->getDropshipper();
        return view('ui/form_reseller', $data);
    }
    public function formtranskasidropshipper()
    {
        $sellerdropship = new SellerDropship_Model;
        //$data['reseller'] = $sellerdropship->getReseller();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        return view('ui/form_dropshipper', $data);
    }
    public function tambahtransaksireseller()
    {
        dd($this->request->getVar());
    }
}
