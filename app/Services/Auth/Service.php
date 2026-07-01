<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function register(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'role_id'    => Role::APPLICANT,
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
        ]);
    }
}

