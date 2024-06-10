<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $fillable = [
        'id_profile',
        'judul',
        'desc',
        'created_at',
        'updated_at',
    ];
}
