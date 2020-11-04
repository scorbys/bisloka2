@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
       
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesan</th>
                        <th>Kode Booking</th>
                        <th>Nama Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengembalian as $kmbl)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kmbl->tgl_psn }}</td>
                        <td>{{ $kmbl->kode_bkg }}</td>
                        <td>{{ $kmbl->nama_plg }}</td>
                       	<td>{{ $kmbl->nama_kdr }}</td>
                       	<td><a href="{{ route('pengembalian.information', ['kode_bkg' => $kmbl->kode_bkg ]) }}" class="btn btn-primary btn-sm">Submit</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section> 

@endsection