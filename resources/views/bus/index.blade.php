@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('bus.create') }}" class="btn btn-primary">Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Plat No</th>
                        <th>Harga</th>
                        <th>Brand</th>
                        <th>Merk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buses as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['nama_kdr'] }}</td>
                        <td>{{ $row['tahun_kdr'] }}</td>
                        <td>{{ $row['plat_kdr'] }}</td>
                        <td>{{ number_format($row['harga']) }}</td>
                        <td>{{ $row['brand_kdr'] }}</td>
                        <td> 
                            <a href="{{ route('bus.edit',  ['bus_id' => $row["bus_id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['bus_id']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
    $(".delete-btn").click(function(){
        let id = $(this).attr('data-id');
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                url : "{{url('/')}}/bus/"+id,
                method : "POST",
                data : {
                    _token : "{{csrf_token()}}",
                    _method : "DELETE",
                }
            })
            .then(function(data){
                location.reload();
            });
        }
    })
</script>
@endpush