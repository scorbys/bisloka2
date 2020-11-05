<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama_plg', 'ttl_plg', 'nmrhp_plg', 'alamat_plg', 'jenkel_plg'];
    protected $primaryKey = 'pelanggan_id';
}
