<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesionales_tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
      
        'profesionales_id',
        'tratamiento_id',
        
    ];

}
