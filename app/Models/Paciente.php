<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function obrasociales()
    {
        return $this->belongsTo('obrasociales');
    }
   
    protected $fillable = [
      
        //'fnacimiento',
            'apellido',
            'nombre',
            'telefono1',
            // 'telefono2',
            // 'email',
            // 'osocial',
            // 'plan',
            // 'nrosocial',
            // 'domicilio',
            // 'observa',
            // 'obsclinica',
            // 'dni',
            // 'celular',
        
    ];


    
}
