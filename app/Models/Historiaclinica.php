<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiaclinica extends Model
{
    use HasFactory;

    
protected $fillable = [
      
    'dia',
    'paciente',
    'profesional',
    'especialidad',
    'diagnostico',
    
];
}
