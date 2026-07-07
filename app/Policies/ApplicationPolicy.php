<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;

class ApplicationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Application $application): bool
    {
        return $user->isEmployer()
            && $application->vacancy->company->user_id === $user->id;
    }

    public function delete(User $user, Application $application): bool
    {
        return $user->isEmployer()
            && $application->vacancy->company->user_id === $user->id;
    }
}
