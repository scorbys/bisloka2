<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Pelanggan";
        $data['pelanggans'] = Pelanggan::all();
        return view('pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 4;
        $data['title'] = "Tambah Pelanggan";
        return view('pelanggan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_plg' => 'required|string|max:150',
            'nik' => 'required|integer|unique:pelanggans',
            'ttl_plg' => 'required',
            'nmrhp_plg' => 'required|max:15',
            'jenkel_plg' => 'required',
        ]);

        if($validate) {
            $insert = Pelanggan::create($request->toArray());
            $request->session()->flash('success', 'Data ditambahkan!');
            return redirect()->route('pelanggan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 4;
        $data['no'] = 1;
        $data['title'] = "Edit Pelanggan";
        $data['pelanggan'] = Pelanggan::find($id);
        return view('pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        if($pelanggans->nik == $request->nik){
            $validate = $request->validate([
                'nama_plg' => 'required|string|max:150',
                'ttl_plg' => 'required',
                'nmrhp_plg' => 'required|max:15',
                'jenkel_plg' => 'required',
            ]);
        } else {
            $validate = $request->validate([
                'nama_plg' => 'required|string|max:150',
                'nik' => 'required|integer|unique:pelanggans',
                'ttl_plg' => 'required',
                'nmrhp_plg' => 'required|max:15',
                'jenkel_plg' => 'required',
            ]);
        }

        if($validate) {
            $insert = Pelanggan::find($id)->update($request->toArray());
            $request->session()->flash('success', 'Data berhasil dirubah!');
            return redirect()->route('pelanggan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan.index');
    }
}
