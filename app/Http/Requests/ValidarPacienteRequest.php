<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPacienteRequest extends FormRequest
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
           // 'fnacimiento'  => 'required|after_or_equal:dia',
            'apellido'    => 'required|min:1|max:50',
            'nombre'    => 'required|min:1|max:50',
            'telefono1'    => 'required|min:1|max:50',
            // 'telefono2'    => 'required|min:1|max:50',
            // 'email'         => 'required|string|email|max:255',
            // 'osocial'    => 'required|integer|not_in:0',
            // 'plan'    => 'required|min:1|max:50',
            // 'nrosocial'    => 'required|min:1|max:25',
            // 'domicilio'    => 'required|min:1|max:150',
            // 'observa'    => 'required|min:1|max:300',
            // 'obsclinica'    => 'required|min:1|max:500',
            // 'dni' => 'numeric|required',
            // 'celular'    => 'required|min:1|max:50',
        ];
    }

    public function attributes()
    {
        return [
          //  'fnacimiento'  => 'campo fnacimiento',
            'apellido'    => 'campo apellido',
            'nombre'    => 'campo nombre',
            'telefono1'    => 'campo telefono1',
            // 'telefono2'    => 'campo telefono2',
            // 'email'         => 'campo email',
            // 'osocial'    => 'campo obra social',
            // 'plan'    => 'campo plan',
            // 'nrosocial'    => 'campo nro social',
            // 'domicilio'    => 'campo domicilio',
            // 'observa'    => 'campo observacion',
            // 'obsclinica'    => 'campo observacion clinica',
            // 'dni' => 'campo dni',
            // 'celular'    => 'campo celular',
            
        ];
    
    }

    public function messages()
    {
    return [
     
       // 'fnacimiento.required'  => 'El :attribute es obligatorio.',   
        'apellido.required'    => 'El :attribute es obligatorio.',   
        'nombre.required'    => 'El :attribute es obligatorio.',   
        'telefono1.required'    => 'El :attribute es obligatorio.',   
        // 'telefono2.required'    => 'El :attribute es obligatorio.',   
        // 'email.required'         => 'El :attribute es obligatorio.',   
        // 'osocial.required'    => 'El :attribute es obligatorio.',   
        // 'plan.required'    => 'El :attribute es obligatorio.',   
        // 'nrosocial.required'    => 'El :attribute es obligatorio.',   
        // 'domicilio.required'    => 'El :attribute es obligatorio.',   
        // 'observa.required'    => 'El :attribute es obligatorio.',   
        // 'obsclinica.required'   => 'El :attribute es obligatorio.',
        // 'obsclinica.min'        => 'El :attribute debe contener mas de una letra.',
        // 'obsclinica.max'        => 'El :attribute debe contener max 500 letras.',   
        // 'dni.required' => 'El :attribute es obligatorio.',   
        // 'celular.required'    => 'El :attribute es obligatorio.',   
       
 
    ];
    }
}

