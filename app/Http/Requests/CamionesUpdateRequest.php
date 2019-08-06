<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CamionesUpdateRequest extends FormRequest
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
            'modelo' => 'required',
            'marca' => 'required',
            'vin' => 'required',
            'anio' => 'required|numeric',
            'capacidad' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'modelo.required' => 'El Modelo es obligatorio',
            'marca.required' => 'La Marca es obligatoria',
            'vin.required' => 'El VIN es obligatorio',
            'anio.required' => 'El Año es obligatorio',
            'anio.numeric' => 'El Año sólo debe contener números',
            'capacidad.required' => 'La Capacidad es obligatoria',
            'capacidad.numeric' => 'La Capacidad sólo debe contener números'
        ];
    }
}
