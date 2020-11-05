<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = ['kode_bkg', 'tgl_psn', 'durasi', 'tgl_balik_shr', 'tgl_balik', 'harga', 'status', 'kondisi', 'pegawai_id', 'pelanggan_id', 'bus_id'];
    protected $primaryKey = 'bkg_id';
}
