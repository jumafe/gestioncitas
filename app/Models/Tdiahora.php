<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdiahora extends Model
{
    use HasFactory;

    public function profesionales()
{
    return $this->belongsTo('profesionales');
}



protected $fillable = [
    'profesional',
    'dia',
    'horainicio',
    'horafin',
    
];

}

