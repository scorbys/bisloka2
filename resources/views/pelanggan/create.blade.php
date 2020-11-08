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
            <h3 class="card-title">Form {{ $title }} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik"
                                value="{{ old('nik') }}">
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="nama_plg"
                                value="{{ old('nama_plg') }}">
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="text" class="form-control" required name="ttl_plg"
                                value="{{ old('ttl_plg') }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>No HP</p>
                            <input type="number" class="form-control" required name="nmrhp_plg"
                                value="{{ old('nmrhp_plg') }}">
                        </div>
                        <div class="form-group">
                            <p>Jenis Kelamin</p>
                            <select name="jenkel_plg" class="form-control">
                                <option value="laki"
                                    {{ (old("jenkel_plg") == 'laki' ? "selected":"") }}>
                                    Laki</option>
                                <option value="perempuan"
                                    {{ (old("jenkel_plg") == 'perempuan' ? "selected":"") }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="alamat_plg"
                                value="{{ old('alamat_plg') }}">
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection