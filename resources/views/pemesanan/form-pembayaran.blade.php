<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Tipe Pembayaran</p>
                        <select name="type" class="form-control">
                            <option value=""> - Pilih Salah Satu - </option>
                            <option value="dp">DP</option>
                            <option value="lunas">Lunas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p>Total</p>
                        <input type="number" name="total" class="form-control"
                            value="{{ old('total') }}">
                    </div>

                    <input type="submit" value="PROCESS">
                </div>

            </div>
        </div>
    </div>
</div>