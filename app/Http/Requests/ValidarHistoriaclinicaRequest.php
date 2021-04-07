<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarHistoriaclinicaRequest extends FormRequest
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
            'dia'  => 'required|after_or_equal:dia',
            'profesional'    => 'required|integer|not_in:0',
            'paciente'    => 'required|integer|not_in:0',
            'especialidad'    => 'required|integer|not_in:0',
            'diagnostico'    => 'required|min:1|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'dia'    => 'campo día',
            'profesional'  => 'campo profesional',
            'paciente'  => 'campo paciente',
            'especialidad'  => 'campo especialidad',
            'diagnostico'    => 'campo diagnostico',
            
        ];
    
    }

    public function messages()
    {
    return [
        'dia.required'   => 'El :attribute es obligatorio.',       
        'profesional.required'   => 'El :attribute es obligatorio.',
        'paciente.required'   => 'El :attribute es obligatorio.',
        'especialidad.required'   => 'El :attribute es obligatorio.',
        'diagnostico.required'   => 'El :attribute es obligatorio.',
        'diagonostico.min'        => 'El :attribute debe contener mas de una letra.',
        'diagnostico.max'        => 'El :attribute debe contener max 50 letras.',
        
 
    ];
    }
}

