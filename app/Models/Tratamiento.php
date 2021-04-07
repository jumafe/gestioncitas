<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    public function profesionales()
{
    return $this->belongsToMany(Profesionales::class,'profesionales_tratamientos','tratamiento_id','profesionales_id');
     
}   

protected $fillable = [
      
    'descripcion',
    'estado',
    
];


}
