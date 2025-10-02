<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * This allows Tag::firstOrCreate(['name' => '...']) to work.
     */
    protected $fillable = [
        'name',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");
    }
}