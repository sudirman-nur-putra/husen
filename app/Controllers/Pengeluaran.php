<?php

namespace App\Controllers;

class Pengeluaran extends BaseController
{
    public function index()
    {
        return view('ui/pengeluaran');
    }
    public function biayaoverhead()
    {
        return view('ui/form_biayaoverhead');
    }
    public function pembelianbarang()
    {
        return view('ui/form_pembelianBarang');
    }
}
