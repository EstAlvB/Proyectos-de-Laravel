<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaisRequest extends FormRequest
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
            'name' => 'required|unique:pais,name',
            'nomenclatura' => 'required|unique:pais,nomenclatura|size:3',
            'postal_code' => 'required|min:4|max:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Se requiere el nombre del país',
            'name.unique' => 'El país ' . $this->name .' ya existe',
            'nomenclatura.required' => 'Se requiere la nomenclatura del país',
            'nomenclatura.unique' => 'La nomenclatura ' . $this->nomenclatura . ' ya existe',
            'nomenclatura.size' => 'La nomenclatura debe tener una longitud igual a 3 caracteres',
            'postal_code.required' => 'Se requiere el código postal del país',
        ];
    }
}
