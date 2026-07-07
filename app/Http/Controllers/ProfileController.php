<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\PasswordUpdateRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Страница профиля.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Обновление профиля.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return back()->with(
            'success',
            'Профиль успешно обновлен.'
        );
    }

    /**
     * Смена пароля.
     */
    public function updatePassword(PasswordUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'password' => Hash::make(
                $request->new_password
            ),
        ]);

        return back()->with(
            'success',
            'Пароль успешно изменен.'
        );
    }

    /**
     * Удаление аккаунта.
     */
    public function destroy()
    {
        $user = auth()->user();

        Auth::logout();

        $user->delete();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
