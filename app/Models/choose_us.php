<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choose_us extends Model
{
    protected $table = 'choose_us';
    protected $primaryKey = 'id_choose_us';
    protected $fillable = [
        'id_choose_us',
        'name',
        'desc',
        'image_path',
        'created_at',
        'updated_at',
    ];
}
