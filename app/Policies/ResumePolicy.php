<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;

class ResumePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Просмотр списка резюме.
     */
    public function viewAny(User $user): bool
    {
        return $user->isApplicant()
            || $user->isEmployer();
    }

    /**
     * Просмотр резюме.
     */
    public function view(User $user, Resume $resume): bool
    {
        return $user->isApplicant()
            || $user->isEmployer();
    }

    /**
     * Создание резюме.
     */
    public function create(User $user): bool
    {
        return $user->isApplicant();
    }

    /**
     * Редактирование.
     */
    public function update(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    /**
     * Удаление.
     */
    public function delete(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }
}
