<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPosting extends Model
{
    use HasFactory;
    protected $fillable = ['images', 'title', 'category_id', 'company_id', 'requirements', 'benefits', 'responsibility', 'location', 'min_salary', 'max_salary', 'type', 'status'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the category that owns the job posting.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the company that owns the job posting.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'pivot_job_applicant', 'job_id', 'applicant_id');
    }
}
