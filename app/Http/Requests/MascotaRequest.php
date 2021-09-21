<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
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
            'nombre'=>'required|min:4',
            'raza_id'=>'required',
            'etapa_id'=>'required',
            'detalle'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'El nombre es requerido',
            'raza_id.*'=>'La raza es requerida',
            'etapa_id.*'=>'La etapa es requerida',
            'detalle.*'=>'El detalle es requerido'
        ];
    }
}
