@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('pelanggan.create') }}"
                    class="btn btn-primary">Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $row)
                        <blade
                            php|%20%24create%20%3D%20explode(%26%2339%3B%20%26%2339%3B%2C%20%24row%5B%26%2339%3Bcreated_at%26%2339%3B%5D)%3B%20%20%40endphp%0D>

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row['nik'] }}</td>
                                <td>{{ $row['nama_plg'] }}</td>
                                <td>{{ $row['ttl_plg'] }}</td>
                                <td>{{ $row['nmrhp_plg'] }}</td>
                                <td>{{ $row['alamat_plg'] }}</td>
                                <td>{{ $row['jenkel_plg'] }}</td>
                                <td>{{ $create[0] }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.edit',  ['pelanggan' => $row["pelanggan_id"]]) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                                    <a data-id="{{ $row['pelanggan_id'] }}"
                                        class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>

@endsection


@push('scripts')
    <script>
        $(".delete-btn").click(function () {
            let id = $(this).attr('data-id');
            if (confirm("Apa anda yakin akan menghapus? ")) {
                $.ajax({
                        url: "{{ url('/') }}/pelanggan/" + id,
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE",
                        }
                    })
                    .then(function (data) {
                        location.reload();
                    });
            }
        })
    </script>
@endpush