<?php

namespace App\Controllers;

use App\Models\DataBarang_Model;
use App\Models\PembelianBarangModel;
use App\Models\OverheadModel;

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
}
