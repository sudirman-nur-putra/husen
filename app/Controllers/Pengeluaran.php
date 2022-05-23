<?php

namespace App\Controllers;

use App\Models\DataBarang_Model;
use App\Models\PembelianBarangModel;
use App\Models\OverheadModel;
use App\Models\SellerDropship_Model;

class Pengeluaran extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        if ($session->get('id') == FALSE) {
            return redirect()->to('/login');
        }
        $belibarang = new PembelianBarangModel();
        $overhead = new OverheadModel();
        $sellerdropship = new SellerDropship_Model;
        $data['dropshipper'] = $sellerdropship->getDropshipper();
        $data['sum'] = $sellerdropship->sumDropshipper();
        $data['blbarang'] = $belibarang->getNamaBarang();
        $data['overhead'] = $overhead->fetch_data();
        return view('ui/pengeluaran', $data);
    }
    public function biayaoverhead()
    {
        return view('ui/form_biayaoverhead');
    }
    public function pembelianbarang()
    {
        $databarang = new DataBarang_Model();
        $data['barang'] = $databarang->fetch_data();
        return view('ui/form_pembelianBarang', $data);
    }

    public function tambahpembelianbarang()
    {

        $pembelianbarang = new PembelianBarangModel();
        $data = [
            'id_barang' => $this->request->getPost('produk'),
            'nama_toko' => $this->request->getPost('namatoko'),
            'jumlah_beli' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total_harga' => $this->request->getPost('harga') * $this->request->getPost('jumlah'),
        ];
        $pembelianbarang->save($data);
        return redirect()->to('/pengeluaran');
    }

    public function tambahbiayaoverhead()
    {

        $biayaoverhead = new OverheadModel();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah_pengeluaran' => $this->request->getPost('total'),
        ];
        $biayaoverhead->save($data);
        return redirect()->to('/pengeluaran');
    }

    public function deletepembelianbarang($id)
    {
        $belibarang = new PembelianBarangModel();
        $belibarang->delete($id);
        return redirect()->to('/pengeluaran');
    }

    public function deleteoverhead($id)
    {
        $overhead = new OverheadModel();
        $overhead->delete($id);
        return redirect()->to('/pengeluaran');
    }

    public function editoverhead($id)
    {
        $overhead = new OverheadModel();
        $data['overhead'] = $overhead->getOverhead($id);
        //dd($data);
        return view('ui/editoverhead', $data);
    }

    public function updateoverhead($id)
    {
        $biayaoverhead = new OverheadModel();
        $data = [
            'id' => $id,
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah_pengeluaran' => $this->request->getPost('total'),
        ];
        $biayaoverhead->save($data);
        return redirect()->to('/pengeluaran');
    }

    public function editpembelianbarang($id)
    {
        $belibarang = new PembelianBarangModel();
        $databarang = new DataBarang_Model();
        $data['barang'] = $databarang->fetch_data();
        $data['belibarang'] = $belibarang->getPembelianBarang($id);
        //dd($data);
        return view('ui/editpembelianbarang', $data);
    }

    public function updatepembelianbarang($id)
    {
        $pembelianbarang = new PembelianBarangModel();
        $data = [
            'id' => $id,
            'id_barang' => $this->request->getPost('namaproduk'),
            'nama_toko' => $this->request->getPost('namatoko'),
            'jumlah_beli' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total_harga' => $this->request->getPost('harga') * $this->request->getPost('jumlah'),
        ];
        $pembelianbarang->save($data);
        return redirect()->to('/pengeluaran');
    }
}
