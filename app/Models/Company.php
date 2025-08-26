<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [

        'name',
        'description'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the job postings for the company.
     */
    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }
}
