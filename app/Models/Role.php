<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public const APPLICANT = 1;

    public const EMPLOYER = 2;

    public const ADMIN = 3;

    protected $table = 'roles';

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function isApplicant(): bool
    {
        return $this->id === self::APPLICANT;
    }

    public function isEmployer(): bool
    {
        return $this->id === self::EMPLOYER;
    }

    public function isAdmin(): bool
    {
        return $this->id === self::ADMIN;
    }
}
