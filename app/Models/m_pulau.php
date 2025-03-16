<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_pulau extends Model
{
    protected $table = 'm_pulau';
    protected $primaryKey = 'id_pulau';
    protected $fillable = [
        'id_pulau',
        'name',
        'desc',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
