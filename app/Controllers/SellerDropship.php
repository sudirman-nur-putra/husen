<?php

namespace App\Controllers;
use App\Models\SellerDropship_Model;
class SellerDropship extends BaseController
{
    public function index()
    {
        $sellerdropship = new SellerDropship_Model;
        $data['reseller'] = $sellerdropship->getReseller();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['count'] = $sellerdropship->countDropshipper();
        return view('ui/seller_dropship', $data);
    }
    public function formreseller(){
        return view('ui/form_dataReseller');
    }
    public function formdropshipper(){
        return view('ui/form_dataDropship');
    }

}
