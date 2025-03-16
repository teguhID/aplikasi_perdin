<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_provinsi extends Model
{
    protected $table = 'm_provinsi';
    protected $primaryKey = 'id_provinsi';
    protected $fillable = [
        'id_provinsi',
        'id_pulau',
        'name',
        'desc',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    function pulau()
    {
        return $this->hasOne(m_pulau::class, 'id_pulau', 'id_pulau');
    }
}
