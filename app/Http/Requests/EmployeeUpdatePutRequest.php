<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdatePutRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'sometimes|between:3,255',
            'cpf' => 'sometimes|min:11|max:11|unique:employees,cpf',
            'birthDate' => 'sometimes|date',
            'nationality' => 'sometimes',
            'schooling' => 'sometimes',
            'profession' => 'sometimes',
            'gender' => 'sometimes',
            'status' => 'sometimes',
            'phone' => 'sometimes',
            'email' => 'unique:employees,email',

            'cep' => 'between:8,8',
            'street' => 'sometimes',
            'number' => 'sometimes',
            'district' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'complement' => 'sometimes',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O :attribute informado já está registrado em nosso sistema', 
            'between' => 'O campo :attribute precisa ter entre :min e :max caracteres',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
            'max' => 'O campo :attribute excedeu o limite de :max caracteres',
            'date' => 'O campo :attribute é inválido',
        ];
    }
}
