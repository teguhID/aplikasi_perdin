<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_kota extends Model
{
    protected $table = 'm_kota';
    protected $primaryKey = 'id_kota';
    protected $fillable = [
        'id_kota',
        'id_provinsi',
        'id_pulau',
        'name',
        'is_luar_negri',
        'long',
        'lat',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    function provinsi()
    {
        return $this->hasOne(m_provinsi::class, 'id_provinsi', 'id_provinsi');
    }

    function pulau()
    {
        return $this->hasOne(m_pulau::class, 'id_pulau', 'id_pulau');
    }
}
