<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResumeVisibility extends Model
{
    protected $table = 'resume_visibilities';
    protected $guarded = [];

    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class, 'resume_visibility_id', 'id');
    }
}
