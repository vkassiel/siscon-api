<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStorePostRequest extends FormRequest
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
            'name' => 'required|between:3,255',
            'cpf' => 'required|min:11|max:11|unique:employees,cpf',
            'birthDate' => 'required|date',
            'nationality' => 'required',
            'schooling' => 'required',
            'profession' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:employees,email',
            
            'cep' => 'required|min:8|max:8',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'country' => 'required',
            'city' => 'required',
            'complement' => 'required',
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
            'birthDate' => 'data de nascimento',
            'nationality' => 'nacionalidade',
            'schooling' => 'escolaridade',
            'profession' => 'profissão',
            'gender' => 'gênero',
            'phone' => 'telefone',
            
            'street' => 'rua',
            'number' => 'número',
            'district' => 'bairro',
            'country' => 'estado',
            'city' => 'cidade',
            'complement' => 'complemento',
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
