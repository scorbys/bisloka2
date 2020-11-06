<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Tipe Pembayaran</p>
                        <select name="tipe_byr" class="form-control" readonly>
                            <option value="lunas">Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Total</p>
                        <input type="text" name="total" class="form-control" value="{{ number_format($ttl) }}" readonly>
                    </div>
                    <div class="form-group">
                        <p>Total Harga</p>
                        <input type="number" name="total" class="form-control" value="{{ old('total') }}" id="total">
                    </div>
                    <div class="form-group">
                        <table> {{--  border="0" --}}
                            <tr>
                                <td>Kembalian : </td>
                                <td><div id="kembalian"></div></td>
                            </tr>
                        </table>

                    </div>

                    <input type="submit" value="PROCESS">
                </div>
                
            </div>
        </div>
    </div>
</div>