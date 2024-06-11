<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $fillable = [
        'id_blog',
        'judul',
        'desc',
        'image_path',
        'created_at',
        'updated_at',
    ];
}
