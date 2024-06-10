<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pesanan';
    protected $fillable = [
        'jadwal_id',
        'kursi_id',
        'nama',
        'no_telp',
        'biaya_tambahan',
        'master_titik_jemput_id',
        'status'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
