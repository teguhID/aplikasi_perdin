<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_role extends Model
{
    protected $table = 'm_role';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'id_role',
        'name',
        'desc',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
