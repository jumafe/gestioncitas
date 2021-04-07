<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesionales extends Model
{
    use HasFactory;

  
public function tratamientos()
{
    return $this->belongsToMany(Tratamiento::class,'profesionales_tratamientos','profesionales_id','tratamiento_id');
    
}    

protected $fillable = [
      
    
        'apellido',
        'nombre',
        'telefono1',
        'telefono2',
        'email',
        'doctor',
        'especialidad',
        'intervalos',
        'sobreturno',
      
        'sobreturnoe',
        
        'practicas',
       
        'estado',       
    
];


}
