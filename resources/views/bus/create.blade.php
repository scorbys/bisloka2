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
            <form action="{{ route('bus.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nama Bus</p>
                            <input type="text" class="form-control" required name="nama_kdr"
                                value="{{ old('nama_kdr') }}">
                        </div>
                        <div class="form-group">
                            <p>Tahun</p>
                            <input type="number" class="form-control" required name="tahun_kdr"
                                value="{{ old('tahun_kdr') }}">
                        </div>
                        <div class="form-group">
                            <p>Plat No</p>
                            <input type="text" class="form-control" required name="plat_kdr"
                                value="{{ old('plat_kdr') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Harga</p>
                            <input type="number" class="form-control" required name="harga"
                                value="{{ old('harga') }}">
                        </div>
                        <div class="form-group">
                            <p>Brand</p>
                            <select name="brand_id" class="form-control">
                                <option value=''>- Pilih Satu -</option>
                                @foreach($brands as $list)
                                    <option value="{{ $list['brand_id'] }}">
                                        {{ $list['nama_brand'] }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection