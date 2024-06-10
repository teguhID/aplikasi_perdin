<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    protected $fillable = [
        'id_contact',
        'icon',
        'name',
        'desc',
        'created_at',
        'updated_at',
    ];
}
