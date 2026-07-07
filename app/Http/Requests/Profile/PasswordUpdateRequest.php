<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации.
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                'current_password',
            ],

            'new_password' => [
                'required',
                'confirmed',
                'min:4'
//                Password::defaults(),
            ],

            'new_password_confirmation' => [
                'required',
            ],
        ];
    }

    /**
     * Человекочитаемые названия полей.
     */
    public function attributes(): array
    {
        return [
            'current_password' => 'текущий пароль',
            'new_password' => 'новый пароль',
            'new_password_confirmation' => 'подтверждение нового пароля',
        ];
    }
}
