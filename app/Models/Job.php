<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// This class now extends Model, making it an Eloquent Model
class Job extends Model
{
    // Tells Eloquent to use the job_listings table (since it's not 'jobs')
    use HasFactory;
    protected $table = 'job_listings';

    // This relationship tells Eloquent that a Job belongs to an Employer
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}