<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChoferesUpdateRequest extends FormRequest
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'rut' => 'required',
            'edad' => 'required|numeric',
            'genero' => 'required',
            'licencia' => 'required',
            'certificado' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'Los Nombres son obligatorios',
            'apellidos.required' => 'Los Apellidos son obligatorios',
            'rut.required' => 'El RUT es obligatorio',
            'edad.required' => 'La edad es obligatoria',
            'edad.numeric' => 'La edad sólo debe contener números',
            'genero.required' => 'Debe seleccionar un género',
            'licencia.required' => 'Debe seleccionar si posee o no Licencia',
            'certificado.required' => 'Debe seleccionar si posee o no certificado médico'
        ];
    }
}
