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
        $data['count'] = $sellerdropship->countDropshipper();
        $data['sum'] = $sellerdropship->sumDropshipper();
        return view('ui/seller_dropship', $data);
    }
    public function totalgajitahun()
    {
        $sellerdropshiptahun = new SellerDropship_Model;
        $data['reseller'] = $sellerdropshiptahun->getReseller();
        $data['dropshipper'] = $sellerdropshiptahun->getDropshipper();
        $data['count'] = $sellerdropshiptahun->countDropshipper();
        $data['sumtahun'] = $sellerdropshiptahun->sumDropshipperTahun();
        return view('ui/seller_dropshiptahun', $data);
    }

    public function totalgajihari()
    {
        $sellerdropshiphari = new SellerDropship_Model;
        $data['reseller'] = $sellerdropshiphari->getReseller();
        $data['dropshipper'] = $sellerdropshiphari->getDropshipper();
        $data['count'] = $sellerdropshiphari->countDropshipper();
        $data['sumhari'] = $sellerdropshiphari->sumDropshipperHari();
        return view('ui/seller_dropshiphari', $data);
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
