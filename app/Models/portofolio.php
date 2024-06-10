<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id_portofolio';
    protected $fillable = [
        'id_portofolio',
        'image_path',
        'created_at',
        'updated_at',
    ];
}
