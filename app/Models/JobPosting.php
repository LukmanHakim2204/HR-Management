<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',
        'title',
        'category_id',
        'company_id',
        'requirements',
        'benefits',
        'responsibility',
        'location',
        'min_salary',
        'max_salary',
        'type',
        'status'
    ];

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
}
