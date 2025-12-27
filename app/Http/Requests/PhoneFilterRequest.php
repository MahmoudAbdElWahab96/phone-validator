<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country' => ['nullable', 'string'],
            'state'   => ['nullable', 'in:ok,nok'],
        ];
    }

    public function country(): ?string
    {
        return $this->input('country');
    }

    public function state(): ?string
    {
        return $this->input('state');
    }
}
