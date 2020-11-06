<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $fillable = ['total', 'tanggal', 'pelanggan_id', 'pembayaran_id', 'kode_bkg'];
    protected $primaryKey = 'pembayaran_id';
}
