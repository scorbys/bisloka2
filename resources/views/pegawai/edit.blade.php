@extends('layouts.app')

@section('content')

<section class="content col-md-6">

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
            <form
                action="{{ route('pegawai.update', ['pegawai' => $pegawais->id]) }}"
                method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="name"
                                value="{{ $pegawais->name }}">
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" class="form-control" required name="email"
                                value="{{ $pegawais->email }}">
                        </div>
                    </div>

                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>

@endsection