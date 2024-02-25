<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class GeocodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'geocode' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'geocode.required' => 'Это поле необходимо заполнить'
        ];
    }

}
