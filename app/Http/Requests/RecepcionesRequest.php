<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecepcionesRequest extends FormRequest
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
            'kg_pesaje' => 'required|numeric',
            'hora_llegada' => 'required',
            'total_kg_entrega' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'kg_pesaje.required' => 'El Pesaje es obligatorio',
            'kg_pesaje.numeric' => 'El Pesaje sólo debe contener números',
            'hora_llegada.required' => 'Debe marcar la Hora de Llegada',
            'total_kg_entrega.required' => 'Debe Ingresar los Kgs totales de Llegada',
            'total_kg_entrega.numeric' => 'Los Kgs totales de Llegada sólo deben contener números'
        ];
    }
}
