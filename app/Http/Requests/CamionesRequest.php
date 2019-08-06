<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CamionesRequest extends FormRequest
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
            'vin' => 'required|unique:camiones',
            'anio' => 'required|numeric',
            'capacidad' => 'required|numeric'
        ];
    }

    public function FunctionName($value='')
    {
        # code...
    }
}
