<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespachosRequest extends FormRequest
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
            'num_guia' => 'required',
            'patente' => 'required',
            'id_chofer' => 'required',
            'kg_pesaje' => 'required|numeric',
            'hora_salida' => 'required',
            'total_kg_salida' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'num_guia.required' => 'El Número de Guía es obligatorio',
            'patente.required' => 'La Patente es obligatoria',
            'id_chofer.required' => 'Debe seleccionar un Chofer',
            'kg_pesaje.required' => 'El Pesaje es obligatorio',
            'kg_pesaje.numeric' => 'El Pesaje sólo debe contener números',
            'hora_salida.required' => 'Debe marcar la Hora de Salida',
            'total_kg_salida.required' => 'Debe Ingresar los Kgs totales de la Salida',
            'total_kg_salida.numeric' => 'Los Kgs totales de la Salida sólo deben contener números'
        ];
    }
}
