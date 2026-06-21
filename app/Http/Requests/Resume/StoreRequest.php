<?php

namespace App\Http\Requests\Resume;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],

            'about' => ['nullable', 'string'],

            'desired_salary' => ['nullable', 'integer', 'min:0', 'max:1000000'],

            'city' => ['nullable', 'string', 'max:255'],

            'employment_type_id' => [
                'nullable',
                'integer',
                'exists:employment_types,id',
            ],

            'resume_visibility_id' => [
                'required',
                'integer',
                'exists:resume_visibilities,id',
            ],

            'skills' => ['nullable', 'array'],

            'skills.*' => [
                'integer',
                'exists:skills,id',
            ],
        ];
    }
}
