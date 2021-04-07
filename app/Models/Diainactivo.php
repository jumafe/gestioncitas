<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diainactivo extends Model
{
    use HasFactory;

    protected $fillable = [
      
        'diadesde',
        'descripcion',
        'profesional',
        
    ];


}
