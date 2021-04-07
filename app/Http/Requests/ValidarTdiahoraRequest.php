<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarTdiahoraRequest extends FormRequest
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
            'profesional'    => 'required|integer|not_in:0',
            'dia'  => 'required|integer|not_in:0',
            'horainicio'   => 'required',
            'horafin'   => 'required',
            ''
         
           
        ];
    }

    public function attributes()
    {
        return [
            'profesional'    => 'campo profesional',
            'dia'    => 'campo dia',
            'horainicio'    => 'campo horainicio',
            'horafin'    => 'campo horafin',
            
        ];
    
    }

    public function messages()
    {
    return [
        
        'profesional.required'   => 'El :attribute es obligatorio.',
        'dia.required'   => 'El :attribute es obligatorio.',
        'horainicio.required'   => 'El :attribute es obligatorio.',
        'horafin.required'   => 'El :attribute es obligatorio.', 
    ];
    }
}

