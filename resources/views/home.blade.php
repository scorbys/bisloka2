@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="content">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h3 class="card-title">Deskripsi Sistem Rentcar</h3>
            </div>
            <div class="card-body">
                Pak Joni adalah seorang pengusaha jasa sewa kendaraan. Dia memiliki banyak kendaraan 
                dengan berbagai merk dan setiap tahunnya selalu menambah 1 - 4 kendaraan baru untuk 
                jasa sewa kendaraannya. Kantornya tidak terlalu besar namun dia memiliki 7 staff yang 
                mengurusi peminjaman dan pendataan kendaraannya.
                Tapi sayangnya, semua pendataannya masih menggunakan buku tulis. Tidak jarang dia 
                salah melakukan pendataan pembayaran dan pinjaman oleh klien kliennya. Terlebih lagi
                data 
                untuk penyewa yang melakukan pemesanan 2 bulan sebelumnya kadang harus dicari 
                secara manual di kitab data peminjam. 
                Lalu apa? Nah dia berencana mencari seorang software developer handal yang bisa 
                membantunya dalam membuatkan sebuah sistem yang dapat melakukan pendataan 
                penyewaan rental kendaraannya. Dengan adanya sistem ini dia berharap dapat lebih 
                mudah dalam melakukan pendataan sewa kendaraannya, pendataan pembayaran dan 
                data data kendaraan yang dia miliki.
                Lalu dia meminta tolong kepada Pak Joko untuk mencarikannya tenaga ahli untuk 
                membuatkan sebuah sistem sesuai permintaannya. Kebetulan Pak Joko memiliki beberapa 
                kenalan developer, salah satunya adalah kamu. Iya kamu. Kamu harus membantu Pak Joni 
                untuk membuat sistem pendataan penyewaan kendaraan pada usahanya. 
                Kamu tidak bisa menolak hehe
            </div>
        </div>
    </section>                  
@endsection
