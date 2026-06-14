<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeEducation extends Model
{
    protected $table = 'resume_educations';

    protected $guarded = [];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }

    public function degree(): BelongsTo
    {
        return $this->belongsTo(EducationDegree::class, 'degree_id', 'id');
    }
}
