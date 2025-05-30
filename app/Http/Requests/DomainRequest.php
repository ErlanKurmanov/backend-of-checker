<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueDomainsInArrayRule;
use App\Rules\ValidDomainFormatRule;

class DomainRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'domains'   => ['required', 'array', 'min:1', new UniqueDomainsInArrayRule],
            'domains.*' => ['required', 'string', new ValidDomainFormatRule],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'domains.required' => 'Пожалуйста, предоставьте список доменов.',
            'domains.array'    => 'Список доменов должен быть массивом.',
            'domains.min'      => 'Пожалуйста, укажите хотя бы один домен для проверки.',
        ];
    }
}
