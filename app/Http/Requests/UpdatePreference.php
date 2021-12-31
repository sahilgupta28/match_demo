<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePreference extends FormRequest
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
            'annual_income' => ['required', 'array'],
            'occupation.*' => ['required', 'array'],
            'family_type.*' => ['required', 'array'],
            'manglik.*' => ['required', 'array'],
            'annual_income.*' => ['required', 'integer', 'min:50000'],
            'occupation.*' => ['required', 'in:' . implode(',', config('constants.OCCUPATION'))],
            'family_type.*' => ['required', 'in:' . implode(',', config('constants.FAMILY_TYPE'))],
            'manglik.*' => ['required', 'in:' . implode(',', config('constants.MANGLIK'))]
        ];
    }
}
