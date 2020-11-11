@extends('layouts.app')

@section('content')

<section class="content col-md-6">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

    <!-- Modal -->
    @include('pemesanan.form-pelanggan')

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{ $title }} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pemesanan.calculate') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Kode Booking</p>
                            <input type="text" class="form-control" required name="kode_bkg" value=" BSL-{{ rand() }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <p>Nama/ID Pelanggan</p>
                            <input type="text" class="form-control" required id="pelanggan"
                                value="{{ old('pelanggan_id') }}" placeholder="masukkan nama/id">
                            <input type="hidden" name="pelanggan_id" id="pelanggan_id"
                                value="{{ old('pelanggan_id') }}">
                            <div id="pelanggan-list"></div>
                        </div>
                        <div class="form-group">
                            <p>Tanggal Pesan</p>
                            <input type="text" class="form-control" required name="tgl_psn"
                                value="{{ old('tgl_psn') }}" id="datepickers">
                        </div>
                        <div class="form-group">
                            <p>Durasi </p>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="number" class="form-control" required name="durasi" value="1" min="1">
                                </div>
                                <div class="col-md-10">
                                    Hari
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <p>Bus </p>
                            <select name="bus_id" class="form-control">
                                <option value=""> - Pilih Kendaraan - </option>
                                @foreach($buses as $bus)
                                    <option value="{{ $bus->bus_id }}"
                                        {{ ($bus->bus_id == old('bus_id') ? 'selected' : '') }}>
                                        {{ $bus->nama_kdr }} - Rp.
                                        {{ number_format($bus->harga)." per hari" }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                </div>
                <input type="submit" value="Process">
            </form>
        </div>
    </div>

</section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function (e) {
            $('#pelanggan').keyup(function () {
                var pelanggan = $(this).val();
                if (pelanggan != '') {
                    $.ajax({
                        url: "list-member",
                        method: "GET",
                        data: {
                            data: pelanggan
                        },
                        success: function (data) {
                            $('#pelanggan-list').fadeIn();
                            $('#pelanggan-list').html(data);
                        }
                    });
                }
            });
        });
        $(document).on('click', '.li-client', function () {
            $('#pelanggan').val($(this).text());
            var pelanggan_id = $('input[id="pelanggan"]').val();
            newpelanggan = pelanggan_id.split(" ");
            $('#pelanggan_id').val(newpelanggan[0]);
            $('#pelanggan-list').fadeOut();
        });
        $(document).on('click', '.li-client-null', function () {
            $('#pelanggan').val("");

            $('#pelanggan_id').val(newpelanggan[0]);
            $('#pelanggan-list').fadeOut();
        });

        $("body").mouseup(function (e) {
            if ($(e.target).closest('#pelanggan').length == 0) {
                $('#pelanggan-list').stop().fadeOut();
            }
        });
    </script>
@endpush