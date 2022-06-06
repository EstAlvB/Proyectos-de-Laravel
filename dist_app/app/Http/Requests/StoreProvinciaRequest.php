<?php

namespace App\Http\Requests;

use App\Models\Provincia;
use Illuminate\Foundation\Http\FormRequest;

class StoreProvinciaRequest extends FormRequest{


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
            'nombre' => 'required|unique:provincias,nombre,NULL,NULL,pais_id,' . $this->pais_id,
            'cod_provincia' => 'required|unique:provincias,cod_provincia,NULL,NULL,pais_id,' . $this->pais_id
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Se requiere el nombre de la provincia',
            'nombre.unique' => 'La provincia de ' . $this->nombre .' ya existe en el país',
            'cod_provincia.required' => 'Se requiere el código de la provincia',
            'cod_provincia.unique' => 'El código ' . $this->cod_provincia . ' de la provincia ya existe en el país'
        ];
    }
}
