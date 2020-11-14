@extends('layouts.app')

@section('content')

<section class="content col-md-12">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"> Form {{ $title }} </h3>
        </div>
        <form action="{{ route('pemesanan.process') }}" method="post">
            {{ csrf_field() }}

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>Nama</b> </td>
                            <td>: </td>
                            <td>{{ $pelanggan->nama_plg }}</td>
                            <input type="hidden" name="pelanggan_id" value="{{ $pelanggan->pelanggan_id }}" required>
                        </tr>
                    </thead>
                    <tr>
                        <th>Nama Bus </th>
                        <td>: </td>
                        <td>{{ $bus->nama_kdr }}</td>
                        <input type="hidden" name="bus_id" value="{{ $bus->bus_id }}" required>
                    </tr>
                    <tr>
                        <th>Kode Booking </th>
                        <td>: </td>
                        <td>{{ $data['kode_bkg'] }}</td>
                        <input type="hidden" name="kode_bkg" value="{{ $data['kode_bkg'] }}"
                            required>
                    </tr>
                    <tr>
                        <th>Tanggal Pesan</th>
                        <td> : </td>
                        <td>{{ $data['tgl_psn'] }}</td>
                        <input type="hidden" name="tgl_psn" value="{{ $data['tgl_psn'] }}"
                            required>
                    </tr>
                    <tr>
                        <th>Durasi Order</th>
                        <td> : </td>
                        <td>{{ $data['durasi'] }} Hari</td>
                        <input type="hidden" name="durasi" value="{{ $data['durasi'] }}"
                            required>
                    </tr>
                    <tr>
                        <th>Tanggal Balik</th>
                        <td> : </td>
                        <td>{{ $tgl_balik }}</td>
                        <input type="hidden" name="tgl_balik_shr" value="{{ $tgl_balik }}" required>
                    </tr>
                    <tr>
                        <th>Harga per hari</th>
                        <td> : </td>
                        <td>Rp. {{ number_format($bus->harga) }}</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td> : </td>
                        <td>Rp. {{ number_format($total_harga) }}</td>
                        <input type="hidden" name="harga" value="{{ $total_harga }}" required>
                    </tr>
                    <tr>
                        <th>Dp Minimum</th>
                        <td> : </td>
                        <td>Rp. {{ number_format($dp) }}</td>
                        <input type="hidden" name="pegawai_id" value="{{ Auth::user()->id }}" required>
                    </tr>
                    <tr>
                        <td colspan="3"><button href="#" data-toggle="modal" data-target="#paymentModal" type="button">
                                Pesan Sekarang </button></td>
                    </tr>
                </table>
            </div>
            <!-- payment MODALS  -->
            @include('pemesanan.form-pembayaran')
        </form>
    </div>



</section>

<!-- Modal -->
@endsection