<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_status extends Model
{
    protected $table = 'm_status';
    protected $primaryKey = 'id_status';
    protected $fillable = [
        'id_status',
        'name',
        'desc',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
