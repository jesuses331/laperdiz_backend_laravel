<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenunciaRequest extends FormRequest
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
            'fecha'=>'required',
            'titulo'=>'required',
            'ciudad'=>'required',
            'descripcion'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'fecha.*'=>'La fecha es requerida',
            'titulo.*'=>'El titulo es requerido',
            'ciudad.*'=>'La ciudad es requerida',
            'descripcion.*'=>'La descripcion es requerida',
        ];
    }
}
