<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kdr', 'tahun_kdr', 'plat_kdr', 'harga', 'brand_id', 'tesedia'];
    protected $primaryKey = 'bus_id';
}
