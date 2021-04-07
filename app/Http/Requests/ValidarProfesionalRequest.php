<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarProfesionalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'apellido'    => 'required|min:1|max:50',
            'nombre'    => 'required|min:1|max:50',
            'telefono1'    => 'required|min:1|max:50',
            'telefono2'    => 'required|min:1|max:50',
            'email'         => 'required|string|email|max:255',
          
            'especialidad'    => 'required|integer|not_in:0',
            'intervalos'    => 'required',
            'sobreturno'    => 'numeric|required',
            'sobreturnoe' => 'numeric|required',
            'practicas'  => 'numeric|required',
            'estado' => 'required|in:Activo,Inactivo',
      
        ];
    }

    public function attributes()
    {
        return [
            
            'apellido'    => 'campo apellido',
            'nombre'    => 'campo nombre',
            'telefono1'    => 'campo telefono1',
            'telefono2'    => 'campo telefono2',
            'email'         => 'campo email',
          
            'especialidad'    => 'campo especialidad',
            'intervalos'    => 'campo intervalos',
            'sobreturno'    => 'campo sobreturno',
            'sobreturnoe' => 'campo sobreturnoe',
            'practicas'  => 'campo practicas',
            'estado' => 'campo estado',
            
        ];
    
    }

    public function messages()
    {
    return [
     
        'fnacimiento.required'  => 'El :attribute es obligatorio.',   
        'apellido.required'  => 'El :attribute es obligatorio.',   
        'nombre.required'  => 'El :attribute es obligatorio.',   
        'telefono1.required'  => 'El :attribute es obligatorio.',   
        'telefono2.required'  => 'El :attribute es obligatorio.',   
        'email.required'  => 'El :attribute es obligatorio.',   
       
        'especialidad.required'  => 'El :attribute es obligatorio.',   
        'intervalos.required'  => 'El :attribute es obligatorio.',   
        'sobreturno.required'  => 'El :attribute es obligatorio.',   
        'sobreturnoe.required'  => 'El :attribute es obligatorio.',   
        'practicas.required'  => 'El :attribute es obligatorio.',   
        'estado.required'  => 'El :attribute es obligatorio.',   
       
    ];
    }
}

