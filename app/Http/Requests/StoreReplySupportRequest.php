<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReplySupportRequest extends FormRequest
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
        return [
            'content' => [
                'required',
                'min:3',
                'max:10000'
            ],
            'support_id' => [
                'required',
                'exists:supports,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'O campo mensagem é obrigatório.',
            'content.min' => 'A mensagem deve ter no mínimo :min caracteres.',
            'content.max' => 'A mensagem deve ter no máximo :max caracteres.',
            'support_id.required' => 'O ID do suporte é obrigatório.',
            'support_id.exists' => 'O suporte informado não existe.',
        ];
    }
}
