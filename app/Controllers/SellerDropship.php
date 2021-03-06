<?php

namespace App\Controllers;

use App\Models\SellerDropship_Model;

class SellerDropship extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        if ($session->get('id') == FALSE) {
            return redirect()->to('/login');
        }
        $sellerdropship = new SellerDropship_Model;
        $data['reseller'] = $sellerdropship->getReseller();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['dropshipperkeuntungan'] = $sellerdropship->getDropshipperKeuntungan();
        $data['count'] = $sellerdropship->countDropshipper();
        $data['sum'] = $sellerdropship->sumDropshipper();
        $data['sumhari'] = $sellerdropship->sumDropshipperHari();
        $data['sumtahun']= $sellerdropship->sumDropshipperTahun();
        return view('ui/seller_dropship', $data);
    }

    public function formreseller()
    {
        return view('ui/form_dataReseller');
    }
    public function formdropshipper()
    {
        return view('ui/form_dataDropship');
    }

    public function tambahreseller()
    {
        $sellerdropship = new SellerDropship_Model;
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'level' => $this->request->getPost('level'),
        ];
        $sellerdropship->save($data);
        return redirect()->to(base_url('seller_dropship'))->with('status', 'Reseller Berhasil Ditambahkan');
    }
    public function tambahdropshipper()
    {
        $sellerdropship = new SellerDropship_Model;
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nomor_hp' => $this->request->getPost('no_hp'),
            'level' => $this->request->getPost('level'),
        ];
        $sellerdropship->save($data);
        return redirect()->to(base_url('seller_dropship'))->with('status', 'Dropshipper Berhasil Ditambahkan');
    }
}
