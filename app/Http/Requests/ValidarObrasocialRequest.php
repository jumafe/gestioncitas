<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarObrasocialRequest extends FormRequest
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
            'descripcion'    => 'required|min:1|max:50',
            'estado' => 'required|in:Activo,Inactivo',
        ];
    }

    public function attributes()
    {
        return [
            'descripcion'  => 'campo descripcion',
            'estado'  => 'campo estado',
            
        ];
    
    }

    public function messages()
    {
    return [
        
        'descripcion.required'   => 'El :attribute es obligatorio.',
        'descripcion.min'        => 'El :attribute debe contener mas de una letra.',
        'descripion.max'        => 'El :attribute debe contener max 50 letras.',
        'estado.required' => 'El :attribute es obligatorio.',
 
    ];
    }
}

