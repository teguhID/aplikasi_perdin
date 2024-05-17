<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tr_invoice extends Model
{
    protected $table = 'tr_invoice';
    protected $fillable = [
        'id_invoice',
        'id_user',
        'total_harga',
        'domain',
        'duration'
    ];
}
