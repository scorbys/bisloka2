<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Bus;
use App\Models\Pemesanan;
use App\Models\Pengembalian;

class PemesananController extends Controller
{
    public function index(){
        $data['menu'] = 5;
        $data['title'] = 'Pemesanan';
        $data['buses'] = Bus::where('tersedia', "1")->get();
        return view('pemesanan.index', $data);
    }

    public function listMember(){
        $get = $_GET['data'];
        $data = DB::table('pelanggans')->where('nama_plg', 'like', "%$get%")->get();
    
		$output = "<ul class='ul-client'>";
		if(count($data) != 0){
			foreach($data as $row){
				$output .= "<li class='li-client'>".$row->pelanggan_id. " - ". $row->nama_plg ."</li>";
			}
		} else {
			$output .= '<li class="li-client-null">Tidak terdaftar? <a href="" data-toggle="modal" data-target="#pelangganModal">Tambah data</a></li>';
		}

		echo $output;
    }

    public function createPelanggan(request $request){
        $validate = $request->validate([
            'nama_plg' => 'required|string|max:150',
            'nik' => 'required|integer|unique:clients',
            'ttl_plg' => 'required',
            'nmrhp_plg' => 'required|max:15',
            'jenkel_plg' => 'required',
        ]);

        if($validate) {
            $insert = Pelanggan::create($request->toArray());
            $request->session()->flash('success', 'Data pelanggan ditambahkan! Ketik nama dalam inputan');
            return redirect()->route('pemesanan.index');
        }
    }

    public function calculate(Request $request){
        //validate 
        $validate = $request->validate([
            'kode_bkg' => 'required|unique:pemesanans',
            'tgl_psn' => 'required',
            'durasi' => 'required',
        ]);

        //get return date
        $durasi_order = $request->durasi;
        $tgl_psn = $request->tgl_psn;
        $tgl_balik = date('Y-m-d', strtotime('+'.$durasi_order.' days', strtotime($tgl_psn)));

        //get price total
        $bus = Bus::find($request->bus_id);
        $total_harga = $bus->harga * $durasi_order;

        //get dp minimum (30% from the price total)
        $dp = ($total_harga * 10) / 100;

        //get input 
        $data = $request->toArray();

        //get client
        $pelanggan = Pelanggan::find($request->pelanggan_id);

        $title = 'Detail Pesanan';
        $menu = '5';
        
        return view('pemesanan.details', compact('tgl_balik', 'data', 'total_harga', 'bus', 'dp', 'title', 'menu', 'pelanggan'));
        
    }

    public function process(Request $request){
        //validate 
        // dd($request->all());
        $validate = $request->validate([
            'kode_bkg' => 'required|unique:pemesanans',
            'tgl_psn' => 'required',
            'durasi' => 'required',
            'pelanggan_id' => 'required|integer',
            'bus_id' => 'required|integer',
            'durasi' => 'required|integer',
            'tgl_balik_shr' => 'required',
            'harga' => 'required|integer',
            'pegawai_id' => 'required',
            'total' => 'required|integer'
        ]);
       


        //insert to table booking first
        $insert_pemesanan = Pemesanan::create([
            'kode_bkg' => $request->kode_bkg,
            'tgl_psn' => $request->tgl_psn,
            'durasi' => $request->durasi,
            'tgl_balik_shr' => $request->tgl_balik_shr,
            'harga' => $request->harga,
            'status' => 'process',
            'pegawai_id' => $request->pegawai_id,
            'bus_id' => $request->bus_id,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        //insert to payment
        $insert_pembayaran = Pengembalian::create([
            'total' => $request->total,
            'tgl' => date('Y-m-d'),
            'pelanggan_id' => $request->pelanggan_id,
            'pegawai_id' => $request->pegawai_id,
            'kode_bkg' => $request->kode_bkg
        ]);

        //update car status to not available (0)
        $bus = Bus::find($request->bus_id);
        $bus->tersedia = '0';
        $bus->save();
        
        $request->session()->flash('success', 'Transaksi ditambahkan!');
        return redirect()->route('pemesanan.index');
    }
}
