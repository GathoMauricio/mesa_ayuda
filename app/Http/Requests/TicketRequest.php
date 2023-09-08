<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'categoria' => 'required',
            'area' => 'required',
            'sintoma_id' => 'required',
            'prioridad' => 'required',
            'descripcion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'Campo requerido.',
            'area.required' => 'Campo requerido.',
            'sintoma_id.required' => 'Campo requerido.',
            'prioridad.required' => 'Campo requerido.',
            'descripcion.required' => 'Campo requerido.',
        ];
    }
}
