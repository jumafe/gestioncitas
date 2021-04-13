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
            'especialidad'    => 'required|integer|not_in:0',
            'observacion'    => 'required|min:1|max:4000',
        ];
    }

    public function attributes()
    {
        return [
            'dia'    => 'campo día',
            'profesional'  => 'campo profesional',
            'paciente'  => 'campo paciente',
            'especialidad'  => 'campo especialidad',
            'observacion'  => 'campo observacion',
            
            
        ];
    
    }

    public function messages()
    {
    return [
        'dia.required'   => 'El :attribute es obligatorio.',       
        'profesional.required'   => 'El :attribute es obligatorio.',
        'especialidad.required'   => 'El :attribute es obligatorio.',
        'observacion.required'   => 'El :attribute es observacion.',
        
    ];
    }
}

