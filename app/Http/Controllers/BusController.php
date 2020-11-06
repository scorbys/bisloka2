<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Brand;
use DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Buses";
        $data['menu'] = 1;
        $buses = DB::table('buses')
                        ->join('brands', 'buses.brand_id', '=', 'brands.brand_id')
                        ->get()->toArray();
        $data['buses'] = json_decode(json_encode($buses), true);
        $data['no'] = 1;
        return view('bus.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Data Bus";
        $data['menu'] = 1;
        $data['brands'] = Brand::all();
        return view('bus.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->
        validate([
            'nama_kdr' => 'required',
            'tahun_kdr' => 'required|numeric',
            'plat_kdr' => 'required|max:10',
            'harga' => 'required|numeric',
            'brand_id' => 'required'
        ]);
        $insert = Bus::create($request->toArray());
        return redirect()->route('bus.index');
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
        $data['title'] = "Edit Bus";
        $data['menu'] = 1;
        $data['bus'] = Bus::find($id);
        $data['brands'] = Brand::all();
        return view('bus.edit', $data);
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
        $validate = $request->
        validate([
            'nama_kdr' => 'required',
            'tahun_kdr' => 'required|numeric',
            'plat_kdr' => 'required|max:10',
            'harga' => 'required|numeric',
            'brand_id' => 'required'
        ]);
        $update = Bus::find($id)->update($request->toArray());
        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bus::destroy($id);
        return redirect()->route('bus.index');
    }
}
