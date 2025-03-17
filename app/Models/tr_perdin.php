<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tr_perdin extends Model
{
    protected $table = 'tr_perdin';
    protected $primaryKey = 'id_perdin';
    protected $fillable = [
        'id_perdin',
        'id_kota_asal',
        'id_kota_tujuan',
        'id_user_pengaju',
        'id_user_approval',
        'id_status',
        'keterangan',
        'date_berangkat',
        'date_pulang',
        'durasi',
        'jarak',
        'mata_uang',
        'uang_saku',
        'total_uang_saku',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    function kota_asal()
    {
        return $this->hasOne(m_kota::class, 'id_kota', 'id_kota_asal');
    }

    function kota_tujuan()
    {
        return $this->hasOne(m_kota::class, 'id_kota', 'id_kota_tujuan');
    }

    function pengaju()
    {
        return $this->hasOne(User::class, 'id', 'id_user_pengaju');
    }

    function approval()
    {
        return $this->hasOne(User::class, 'id', 'id_user_approval');
    }

    function status()
    {
        return $this->hasOne(m_status::class, 'id_status', 'id_status');
    }
}
