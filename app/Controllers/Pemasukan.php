<?php

namespace App\Controllers;

class Pemasukan extends BaseController
{
    public function index()
    {
        return view('ui/pemasukan');
    }
    public function formtransaksireseller()
    {
        return view('ui/form_reseller');
    }
    public function formtranskasidropshipper()
    {
        return view('ui/form_dropshipper');
    }
}
