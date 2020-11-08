<div class="modal fade" id="pelangganModal" tabindex="-1" role="dialog" aria-labelledby="pelangganModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pelangganModalLabel">Tambah pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('create-pelanggan') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-12">
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
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</div>