<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Pegawai";
        $data['menu'] = 3;
        $data['Pegawai'] = Pegawai::all();
        $data['no'] = 1;
        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['menu'] = 3;
        return view('pegawai.create', $data);
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
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:150|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validate) {
            $input = [];
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['password'] = bcrypt($request->password);
            $insert = Pegawai::create($input);
            if($insert) {
                $request->session()->flash('success', 'Pegawai ditambahkan!');
                return redirect()->route('pegawai.index');
            } else {
                $request->session()->flash('danger', 'Gagal menambahkan!');
                return redirect()->route('pegawai.index');
            }
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
        $data['title'] = "Edit Data Pegawai";
        $data['menu'] = 3;
        $data['pegawai'] = Pegawai::find($id);
        return view('pegawai.edit', $data);
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
        $validate = $request->validate([
            'name' => 'required|string|max:150',
            
        ]);
        $pegawai = Pegawai::find($id);

        if($request->email == $pegawai->email){
            $update = Pegawai::find($id)->update([
                'name' =>  $request['name'], 
            ]); 
            $request->session()->flash('success', 'Data berhasil dirubah!');
            return redirect()->route('pegawai.index');
        } else {
            $update = Pegawai::find($id)->update($request->toArray());
            if($update) {
                $request->session()->flash('success', 'Data berhasil dirubah!');
                return redirect()->route('pegawai.index');
            } else {
                $request->session()->flash('danger', 'Data gagal dirubah!');
                return redirect()->route('pegawai.index');
            }
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
        //
    }
}
