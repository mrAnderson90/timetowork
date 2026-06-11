<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumePhoto extends Model
{

    protected $table = 'resume_photos';

    protected $guarded = [];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}
