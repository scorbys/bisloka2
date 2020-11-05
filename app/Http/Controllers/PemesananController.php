<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 5;
        $data['title'] = 'Pemesanan';
        $data['buses'] = Bus::where('tersedia', "1")->get();
        return view('pemesanan.index', $data);
    }

    /**
     * Menampilkan list pelanggan.
     *
     */
    public function listMember()
    {
        $get = $_GET['data'];
        $data = DB::table('pelanggans')->where('nama_plg', 'like', "%$get%")->get();
		$output = "<ul class='ul-pelanggan'>";
		if(count($data) != 0){
			foreach($data as $row) {
				$output .= "<li class='li-pelanggan'>".$row->pelanggan_id. " - ". $row->nama_plg ."</li>";
			}
		} else {
			$output .= '<li class="li-pelanggan-null">Tidak terdaftar? <a href="" data-toggle="modal" data-target="#pelangganModal">Tambahkan disini</a></li>';
		}
		echo $output;
    }

    /**
     * Membuat pesanan pada pelanggan.
     *
     */
    public function createPelanggan(request $request){
        $validate = $request->validate([
            'nama_plg' => 'required|string|max:150',
            'nik' => 'required|integer|unique:pelanggans',
            'tgl_plg' => 'required',
            'nmrhp_plg' => 'required|max:15',
            'jenkel_plg' => 'required',
        ]);

        if($validate) {
            $insert = Pelanggan::create($request->toArray());
            $request->session()->flash('success', 'Data pelanggan ditambahkan!');
            return redirect()->route('pemesanan.index');
        }
    }

    /**
     * Perhitungan kalkulasi pada saat pemesanan
     *
     */
    public function calculate(Request $request)
    {
        $validate = $request->validate([
            'kode_bkg' => 'required|unique:bookings',
            'tgl_psn' => 'required',
            'durasi' => 'required',
        ]);

        // tanggal pengembalian
        $durasi_order = $request->durasi;
        $tgl_psn = $request->tgl_psn;
        $tgl_balik = date('Y-m-d', strtotime('+'.$durasi_order.' hari', strtotime($tgl_psn)));

        // total harga
        $bus = Bus::find($request->Bus_id);
        $total_harga = $bus->harga * $durasi_order;

        // minimal dp (30% dari total harga)
        $dp = ($total_harga * 10) / 100;

        // inputan
        $data = $request->toArray();

        // pelanggan
        $pelanggans = Pelanggan::find($request->pelanggan_id);

        $title = 'Detail Pemesanan';
        $menu = '5';
        
        return view('pemesanan.details', compact('tgl_balik', 'data', 'total_harga', 'bus', 'dp', 'title', 'menu', 'client'));
    }

    /**
     * Insert pada pemesanan
     *
     */
    public function process(Request $request){
        //validate 
        $validate = $request->validate([
            'kode_bkg' => 'required|unique:pemesanan',
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

        // insert table pemesanan
        $insert_booking = Booking::create([
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

        // insert pembayaran
        $insert_pembayaran = Pengembalian::create([
            'total' => $request->total,
            'tanggal' => date('Y-m-d'),
            'pelanggan_id' => $request->pelanggan_id,
            'pegawai_id' => $request->pegawai_id,
            'kode_bkg' => $request->kode_bkg
        ]);

        // update jika tidak tersedia
        $bus = Bus::find($request->bus_id);
        $bus->tersedia = '0';
        $bus->save();

        $request->session()->flash('success', 'Transaksi berhasil dilakukan!');
        return redirect()->route('pemesanan.index');
    }
}
