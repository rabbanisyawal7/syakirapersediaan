<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';
    protected $primaryKey = 'id_produksi';

    protected $guarded = [];
}