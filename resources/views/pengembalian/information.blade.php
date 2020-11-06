@extends('layouts.app')

@section('content')

<div class="content col-md-12">
	@if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
	<div class="card card-secondary card-outline">
        <div class="card-header">
        	<h3 class="card-title">Informasi Sewa</h3>
        </div>
       <form action="{{ route('pengembalian.process') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
            	<table class="table">
            		<thead>
            			<tr>
            				<td><b>Nama</b> </td>
            				<td>: </td>
            				<td>{{ $pelanggan->nama_plg }}</td>
                            <input type="hidden" name="pelanggan_id" value="{{$pelanggan->pelanggan_id}}" required>
            			</tr>
        			</thead>
                    <tr>
                        <th>Nama Kendaraan</th>
                        <td>: </td>
                        <td>{{ $bus->nama_kdr }}</td>
                        <input type="hidden" name="bus_id" value="{{ $bus->bus_id }}" required>
                    </tr>
        			<tr>
        				<th>Kode Pemesanan</th>
        				<td>: </td>
        				<td>{{ $data['kode_bkg'] }}</td>
                        <input type="hidden" name="kode_bkg" value="{{$data['kode_bkg']}}" required>
        			</tr>
        			<tr>
        				<th>Tanggal Pesan</th>
        				<td> : </td>
        				<td>{{ $data['tgl_psn'] }}</td>
                        <input type="hidden" name="tgl_psn" value="{{$data['tgl_psn']}}" required>
        			</tr>
        			<tr>
        				<th>Durasi</th>
        				<td> : </td>
        				<td>{{ $data['durasi'] }} Hari</td>
                        <input type="hidden" name="durasi" value="{{ $data['durasi'] }}" required>
        			</tr>
        			<tr>
        				<th>Tanggal Balik</th>
        				<td> : </td>
        				<td>{{ $data['tgl_balik_shr'] }}</td>
                        <input type="hidden" name="tgl_balik_shr" value="{{ $data['tgl_balik_shr'] }}" required>
        			</tr>
        			<tr>
        				<th>Harga per hari</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($bus->harga) }}</td>
        			</tr>
        			<tr>
        				<th>Total Harga</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($data['harga']) }}</td>
                        <input type="hidden" name="harga" value="{{ $data['harga'] }}" required>
        			</tr>
        			<tr>
        				<th>Kondisi</th>
        				<td> : </td>
        				@if($kondisi != null)
        				<td style="color:red">Rp. {{ number_format($kondisi) }} (Telat {{$telat}} Hari)</td>
        				@else 
        				<td>0</td>
        				@endif
                        <input type="hidden" name="kondisi" value="{{ $kondisi }}" required>
        			</tr>
        			<tr>
        				<th>DP</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($pembayaran->total) }}</td>
        			</tr>
        			<tr>
        				<th colspan="2">TOTAL</th>
        				<input type="hidden" name="ttl" id="ttl" value="{{ $ttl }}" >
        				<td>Rp. {{ number_format($ttl) }}</td>
        			</tr>
                    <tr>
                        <td colspan="3"><button href="#" data-toggle="modal" data-target="#paymentModal" type="button"> Process </button></td>
                    </tr>
            	</table>
            </div>
            <!-- payment MODALS  -->
            @include('pengembalian.form-payment')
        </form>
    </div>	
</div>

@endsection

@push('scripts')
<script>
	$(document).ready(function(e){
        $('#amount').keyup(function(){
            var amount = $(this).val();
            var total = $('#total').val();
            if(amount != ''){
                $.ajax({
                    success:function(data){
                        $('#change').html(amount - total);
                    }
                });
            }
        });
    });
</script>
@endpush