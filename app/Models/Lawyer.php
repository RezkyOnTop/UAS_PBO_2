<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = [
    'nama',
    'spesialisasi',
    'tarif',
    'deskripsi',
    'foto'
    ];

}
