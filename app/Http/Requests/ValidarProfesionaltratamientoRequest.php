<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarProfesionaltratamientoRequest extends FormRequest
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
            'profesionales_id'    => 'required|integer|not_in:0',
            'tratamiento_id'    => 'required|integer|not_in:0',
        ];
    }

    public function attributes()
    {
        return [
          
            'profesionales_id'    => 'campo profesional',
            'tratamiento_id'    => 'campo tratamiento',
            
        ];
    
    }

    public function messages()
    {
    return [
        
        'profesionales_id.required'   => 'El :attribute es obligatorio.',
        'tratamiento_id.required'   => 'El :attribute es obligatorio.',
       
 
    ];
    }
}

