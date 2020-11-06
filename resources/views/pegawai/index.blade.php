@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawais as $row)
                    @php $create = explode(' ', $row['created_at']);  @endphp

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['email'] }}</td>
                        <td>{{ $create[0] }}</td>
                       
                        <td> 
                            <a href="{{ route('pegawai.edit',  ['pegawai' => $row["id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>                  

@endsection