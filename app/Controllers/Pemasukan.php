<?php

namespace App\Controllers;

use App\Models\DataBarang_Model;
use App\Models\SellerDropship_Model;
use App\Models\Pemasukan_Model;
use App\Models\PemasukanDropshipModel;

class Pemasukan extends BaseController
{

    public function index()
    {
        $session = \Config\Services::session();
        if ($session->get('id') == FALSE) {
            return redirect()->to('/login');
        }
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
        return view('ui/form_reseller', $data);
    }

    public function formtranskasidropshipper()
    {
        $sellerdropship = new SellerDropship_Model;
        $databarang = new DataBarang_Model();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['barang'] = $databarang->fetch_data();
        return view('ui/form_dropshipper', $data);
    }
    public function tambahtransaksireseller()
    {
        $pemasukanreseller = new Pemasukan_Model();
        $databarang = new DataBarang_Model();
        $barang = $databarang->getDataBarang($this->request->getPost('namaproduk'));
        $stoksisa =  $barang[0]['stok'] - $this->request->getPost('jumlah');

        $updatebarang = [
            'id' => $this->request->getPost('namaproduk'),
            'stok' => $stoksisa,
        ];

        $data = [
            'id_user' => $this->request->getPost('namareseller'),
            'id_barang' => $this->request->getPost('namaproduk'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah_barang' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'total_pembelian' => $this->request->getPost('jumlah') * $this->request->getPost('harga'),
        ];
        $pemasukanreseller->save($data);
        $databarang->save($updatebarang);
        return redirect()->to('/pemasukan');
    }
    public function tambahtransaksidropshipper()
    {
        $pemasukandropship = new PemasukanDropshipModel();
        $databarang = new DataBarang_Model();
        $barang = $databarang->getDataBarang($this->request->getPost('produk'));
        $stoksisa =  $barang[0]['stok'] - $this->request->getPost('jumlah');

        $updatebarang = [
            'id' => $this->request->getPost('produk'),
            'stok' => $stoksisa,
        ];
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
        $databarang->save($updatebarang);
        return redirect()->to('/pemasukan');
    }

    public function deletetransaksireseller($id)
    {
        $transaksireseller = new Pemasukan_Model();
        $transaksireseller->delete($id);
        return redirect()->to('/pemasukan');
    }

    public function deletetransaksidropship($id)
    {
        $transaksidropship = new PemasukanDropshipModel();
        $transaksidropship->delete($id);
        return redirect()->to('/pemasukan');
    }

    public function edittransaksireseller($id)
    {
        $sellerdropship = new SellerDropship_Model;
        $databarang = new DataBarang_Model();
        $transaksireseller = new Pemasukan_Model();
        $data['reseller'] = $sellerdropship->getReseller();
        $data['barang'] = $databarang->fetch_data();
        $data['transaksireseller'] = $transaksireseller->getTransReseller($id);
        //dd($data);
        return view('ui/edittransreseller', $data);
    }

    public function updatetransaksireseller($id)
    {
        $pemasukanreseller = new Pemasukan_Model();
        $data = [
            'id' => $id,
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

    public function edittransaksidropship($id)
    {
        $sellerdropship = new SellerDropship_Model();
        $databarang = new DataBarang_Model();
        $transaksidropship = new PemasukanDropshipModel();
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['barang'] = $databarang->fetch_data();
        $data['transaksidropship'] = $transaksidropship->getTransDropship($id);
        //dd($data);
        return view('ui/edittransdropship', $data);
    }

    public function updatetransaksidropship($id)
    {
        $pemasukandropship = new PemasukanDropshipModel();
        $data = [
            'id' => $id,
            'id_user' => $this->request->getPost('namadropship'),
            'id_barang' => $this->request->getPost('namaproduk'),
            'tanggal' => $this->request->getPost('tanggal'),
            'modal' => $this->request->getPost('modal'),
            'jumlah_barang' => $this->request->getPost('jumlah'),
            'harga_jual' => $this->request->getPost('hargajual'),
            'no_resi' => $this->request->getPost('noresi'),
            'status_packing' => $this->request->getPost('packing'),
            'marketplace' => $this->request->getPost('marketplace'),
            'status' => $this->request->getPost('status'),
        ];
        $pemasukandropship->save($data);
        return redirect()->to('/pemasukan');
    }
}
