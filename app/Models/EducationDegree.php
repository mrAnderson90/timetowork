<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EducationDegree extends Model
{
    protected $table = 'education_degrees';
    protected $guarded = [];

    public function educations(): HasMany
    {
        return $this->hasMany(ResumeEducation::class, 'degree_id', 'id');
    }
}
