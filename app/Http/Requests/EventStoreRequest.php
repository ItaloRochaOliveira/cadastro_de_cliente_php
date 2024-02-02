<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'nome'=>[
                'required',
                'string',
                'min:3',
                'max:100'
            ],
            'cpf'=>[
                'required',
                'string',
                'regex: /[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/'
            ],
            'rg'=>[
                'required',
                'string',
                'regex: /[0-9]{2}\.[0-9]{3}\-[0-9]{1,2}/'
            ],
            'cep'=>[
                'required',
                'string',
                'regex: /[0-9]{2}\.[0-9]{3}\-[0-9]{3}/'
            ],
            'logradouro'=>[
                'string',
                'min:3',
                'max:100'
            ],
            'complemento'=>[
                'string',
                'min:3',
                'max:100'
            ],
            'setor'=>[
                'string',
                'min:3',
                'max:100'
            ],
            'cidade'=>[
                'required',
                'string',
                'min:3',
                'max:100'
            ],
            'uf'=>[
                'required',
                'string',
                'min:3',
                'max:100'
            ]
        ];
    }
}