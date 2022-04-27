<?php

namespace App\Controllers;
use App\Models\DataBarang_Model;
class Databarang extends BaseController
{
    public function index()
    {
        $databarang = new DataBarang_Model;
        $data['fetch_data'] = $databarang->fetch_data();
        // return view('ui/data_barang.php');
        return view('ui/data_barang.php', $data);
    }

    public function formdatabarang(){
        return view('ui/form_dataBarang.php');
    }
    public function tambahbarang(){
        $databarang = new DataBarang_Model;
        $data =[
            'nama' => $this->request->getPost('nama'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual_dropshipper' => $this->request->getPost('harga_jual_dropshipper'),
            'harga_jual_reseller' => $this->request->getPost('harga_jual_reseller'),
            'stok' => $this->request->getPost('stok'),
        ];
        $databarang->save($data);
        return redirect()->to(base_url('data_barang'))->with('status','Barang Berhasil Ditambahkan');
    }
}
