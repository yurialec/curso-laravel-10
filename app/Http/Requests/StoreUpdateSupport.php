<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /**
         * Regras de validação das informações
         */
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:100000',
            ]
        ];

        /**
         * Caso o metodo seja de edicao, ele altera as validacoes
         */
        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            
            $id = $this->support ?? $this->id;

            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($id),
            ];
        }

        return $rules;
    }
}
