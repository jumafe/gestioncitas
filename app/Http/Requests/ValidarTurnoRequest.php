<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarTurnoRequest extends FormRequest
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
            'tipo'    => 'required|in:STurno,STurnoE,Turno,Practicas',
            'profesional'    => 'required|integer|not_in:0',
            'tratamiento'    => 'required|integer|not_in:0',
            'paciente'    => 'required|integer|not_in:0',
            'dia'  => 'required|after_or_equal:dia',
            'hora'   => 'required',
          
        ];


    }

    public function attributes()
    {
        return [
            'tipo'    => 'campo tipo',
            'profesional'  => 'campo profesional',
            'tratamiento'  => 'campo tratamiento',
            'paciente'  => 'campo paciente',
            'dia'    => 'campo dia',
            'hora'    => 'campo hora',
            
        ];
    
    }

    public function messages()
    {
    return [
        'tipo.required'   => 'El :attribute es obligatorio.',   
        'profesional.required'   => 'El :attribute es obligatorio.',
        'tratamiento.required'   => 'El :attribute es obligatorio.',
        'paciente.required'   => 'El :attribute es obligatorio.',
        'dia.required'   => 'El :attribute es obligatorio.',   
        'hora.required'  => 'El :attribute es obligatorio.',   
        
 
    ];
    }
}

