<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;

    protected $table = 'persediaan';
    protected $primaryKey = 'id_persediaan';
    protected $fillable = [
        'tgl_persediaan',
        'keterangan',
        'id_barang',
        'kuantitas',
        'id_stok',
    ];
}