<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';
    protected $fillable = [
        'id_toko',
        'name',
        'desc',
        'created_at',
        'updated_at',
    ];
}
