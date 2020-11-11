<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Bus;
use App\Models\Pelanggan;
use App\Models\Pengembalian;
use App\Models\Pemesanan;
use DateTime;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 6;
    	$data['title'] = 'Pengembalian';
        $data['data_bkg'] = Pemesanan::join('pelanggans', 'pelanggans.pelanggan_id', '=', 'pemesanans.pelanggan_id')
                ->join('buses', 'buses.bus_id', '=', 'pemesanans.bus_id')->where('status', 'process')->get();
    	$data['no'] = 1;
    	return view('pengembalian.index', $data);
    }

    /**
     * Menampilkan informasi pengembalian.
     *
     */
    public function information(Request $request){
    	$kode_bkg = $request->kode_bkg;
    	// jika parameter kosong
        if($kode_bkg == '')
        {
    		$request->session()->flash('warning', 'Pilih data sewa dibawah');
        	return redirect()->route('pengembalian.index');
    	} 

    	$table_bkg = Pemesanan::where('kode_bkg', $kode_bkg)->first();
    	// jika kode booking tidak ditemukan
        if($table_bkg->count() == 0)
        {
    		$request->session()->flash('warning', 'Data rental tidak ditemukan!');
        	return redirect()->route('pengembalian.index');
    	} 

    	// denda (10% per harinya)
        if($table_bkg->tgl_balik_shr <  date('Y-m-d'))
        {	
    		$balik_shr = new DateTime($table_bkg->tgl_balik_shr);
    		$balik_skrng = new DateTime(date('Y-m-d'));
    		$selisih = $balik_shr->diff($balik_skrng);
            for($i=1; $i<=$selisih->days; $i++)
            {
    			$kondisi = ($table_bkg->harga * $i.'0')/100;
    		}
    		$data['tepat'] = $kondisi;  
    		$data['telat'] = $selisih->days;
    	} else {
    		$data['tepat'] = null;
    		$data['telat'] = null;
    	}

    	$data['pembayaran'] = Pengembalian::where('kode_bkg',$kode_bkg)->get()->first();
    	$data['data'] = $table_bkg;
    	$data['pelanggan'] = Pelanggan::find($table_bkg->pelanggan_id);
    	$data['bus'] = Bus::find($table_bkg->bus_id);
    	$data['ttl'] = $table_bkg->harga + $data['tepat'] - $data['pembayaran']->total;
    	$data['title'] = 'Proses Pengembalian';
    	$data['menu'] = 6;

    	return view('pengembalian.information', $data);
    }

    /**
     * Proses dalam pengembalian.
     *
     */
    public function process(Request $request)
    {
        $validate = $request->validate
        (
            [
    		'total' => 'required|min:'.$request->ttl .'|numeric',
            'kode_bkg' => 'required',
            ]
        );
        
    	// jika total lebih besar , otomatis jadi value
        if($request->total > $request->ttl)
        {
    		$request->total = $request->ttl;
    	}

    	// update table pemesanan
        $update_pemesanan = Pemesanan::where('kode_bkg', $request->kode_bkg)
            ->update(
                [
                    'tgl_balik' => date('Y-m-d'),
                    'tepat' => $request->kondisi,
                    'status' => 'dibayar'
                    ]
                );

    	// tambah ke table pembayaran
        Pengembalian::create
        (
            [
    		'total' => $request->total,
    		'tanggal' => date('Y-m-d'),
    		'pelanggan_id' => $request->pelanggan_id,
    		'pegawai_id' => Auth::user()->id,
            'kode_bkg' => $request->kode_bkg,
            ]
        );

    	// mengganti status ke tersedia
    	$bus = Bus::find($request->bus_id);
        $bus->tersedia = '1';
        $bus->save();

        $request->session()->flash('success', 'Proses pengembalian berhasil!');
        return redirect()->route('pengembalian.index');
    }
}
