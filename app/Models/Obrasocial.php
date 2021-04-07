<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrasocial extends Model
{
    use HasFactory;
    
    protected $fillable = [
      
        'descripcion',
        'estado',
        
    ];

}
