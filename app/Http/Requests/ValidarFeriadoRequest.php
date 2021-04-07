<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFeriadoRequest extends FormRequest
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
            'descripcion'    => 'required|min:1|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'dia'    => 'campo día',
            'descripcion'  => 'campo descripcion',
            
        ];
    
    }

    public function messages()
    {
    return [
        'dia.required'   => 'El :attribute es obligatorio.',       
        'descripcion.required'   => 'El :attribute es obligatorio.',
        'descripcion.min'        => 'El :attribute debe contener mas de una letra.',
        'descripion.max'        => 'El :attribute debe contener max 50 letras.',
 
    ];
    }
}

