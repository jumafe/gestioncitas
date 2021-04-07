<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarDiainactivoRequest extends FormRequest
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
            'diadesde'  => 'required|after_or_equal:dia',
            'descripcion'    => 'required|min:1|max:50',
            'profesional'    => 'required|integer|not_in:0',
        ];
    }

    public function attributes()
    {
        return [
            'diadesde'    => 'campo díadesde',
            'descripcion'  => 'campo descripcion',
            'profesional'    => 'campo profesional',
            
        ];
    
    }

    public function messages()
    {
    return [
        'diadesde.required'   => 'El :attribute es obligatorio.',       
        
        'profesional.required'   => 'El :attribute es obligatorio.',
        'descripcion.required'   => 'El :attribute es obligatorio.',
        'descripcion.min'        => 'El :attribute debe contener mas de una letra.',
        'descripion.max'        => 'El :attribute debe contener max 50 letras.',
       
 
    ];
    }
}

