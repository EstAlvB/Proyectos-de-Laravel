<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaisRequest extends FormRequest
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
            'name' => 'required|unique:pais,name,' . $this->id,
            'nomenclatura' => 'required|size:3|unique:pais,nomenclatura,' . $this->id,
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
            'postal_code.required' => 'Se requiere el código postal del país',
        ];
    }
}
