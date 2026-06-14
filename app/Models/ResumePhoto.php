<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumePhoto extends Model
{
    protected $table = 'resume_photos';

    protected $guarded = [];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}
