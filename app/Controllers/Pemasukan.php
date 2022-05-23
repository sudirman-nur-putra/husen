<?php

namespace App\Controllers;

use App\Models\DataBarang_Model;
use App\Models\SellerDropship_Model;
use App\Models\Pemasukan_Model;
use App\Models\PemasukanDropshipModel;

class Pemasukan extends BaseController
{
    public function __construct()
    {
        //$this->PemasukanModel = new Pemasukan_Model();
        //$this->PemasukanDropshipModel = new PemasukanDropshipModel();
    }

    public function index()
    {
        $transaksireseller = new Pemasukan_Model();
        $transaksidropship = new PemasukanDropshipModel();
        $data['transaksidropship'] = $transaksidropship->getTransaksiDropship();
        $data['transaksireseller'] = $transaksireseller->getTransaksiReseller();
        return view('ui/pemasukan', $data);
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
        $pemasukanreseller = new Pemasukan_Model();
        $data = [
            'id_user' => $this->request->getPost('namareseller'),
            'id_barang' => $this->request->getPost('namaproduk'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah_barang' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'total_pembelian' => $this->request->getPost('jumlah') * $this->request->getPost('harga'),
        ];
        $pemasukanreseller->save($data);
        return redirect()->to('/pemasukan');
    }
    public function tambahtransaksidropshipper()
    {
        $pemasukandropship = new PemasukanDropshipModel();
        $data = [
            'id_user' => $this->request->getPost('namadropship'),
            'id_barang' => $this->request->getPost('produk'),
            'tanggal' => $this->request->getPost('tanggal'),
            'modal' => $this->request->getPost('modal'),
            'jumlah_barang' => $this->request->getPost('jumlah'),
            'harga_jual' => $this->request->getPost('hargajual'),
            'no_resi' => $this->request->getPost('noresi'),
            'status_packing' => $this->request->getPost('packing'),
            'marketplace' => $this->request->getPost('marketplace'),
            'status' => "Proses",
        ];
        $pemasukandropship->save($data);
        return redirect()->to('/pemasukan');
        //dd($this->request->getVar());
    }
}
