<?php

namespace App\Http\Requests\Vacancy;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => [ 'required', 'string', 'max:255' ],
            'vacancy_category_id' => [
                'required',
                'integer',
                'exists:vacancy_categories,id',
            ],
            'description' => [ 'nullable', 'string' ],
            'salary_from' => [ 'nullable', 'integer' ],
            'salary_to' => [ 'nullable', 'integer' ],
            'city' => [ 'nullable', 'string', 'max:255' ],
            'company_id' => ['required', 'exists:companies,id'],
            'employment_type_id' => [
                'required',
                'integer',
                'exists:employment_types,id',
            ],
            'experience_level_id' => [
                'required',
                'integer',
                'exists:experience_levels,id',
            ],
            'vacancy_status_id' => [
                'required',
                'integer',
                'exists:vacancy_statuses,id',
            ],
            'tags' => [ 'nullable', 'array' ],
            'tags.*' => ['integer', 'exists:tags,id'],
            'skills' => [ 'nullable', 'array' ],
            'skills.*' => ['integer', 'exists:skills,id'],
        ];
    }
}
