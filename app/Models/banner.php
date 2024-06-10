<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $fillable = [
        'id_banner',
        'image_path',
        'created_at',
        'updated_at',
    ];
}
