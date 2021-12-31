<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:' . implode(',', config('constants.GENDER'))],
            'annual_income' => ['required', 'integer', 'min:50000'],
            'occupation' => ['required', 'in:' . implode(',', config('constants.OCCUPATION'))],
            'family_type' => ['required', 'in:' . implode(',', config('constants.FAMILY_TYPE'))],
            'manglik' => ['required', 'in:' . implode(',', config('constants.MANGLIK'))],
            'dob' => ['required', 'before_or_equal:'.\Carbon\Carbon::now()->subYears(config('constants.MIN_AGE'))->format('Y-m-d')]
        ];
    }

    public function messages() 
    {
        return [
            'dob.before_or_equal' => 'Minimum age must be ' . config('constants.MIN_AGE') . ' years.'
        ];
    }
}
