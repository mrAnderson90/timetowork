<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumeExperience extends Model
{
    protected $table = 'resume_experiences';

    protected $guarded = [];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}
