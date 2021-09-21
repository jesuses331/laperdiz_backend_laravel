<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazaRequest extends FormRequest
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
            'nombre'=>'required|min:4|max:20|',
            'talla_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'El nombre es requerido',
            'talla_id.*'=>'La talla es requerida'
        ];
    }
}
