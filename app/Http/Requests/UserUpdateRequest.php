<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d')]
        ];
    }
    public function messages()
    {
        return [
            'dob.before_or_equal' => 'The :attribute must be 18 years or more.',
        ];
    }
}
