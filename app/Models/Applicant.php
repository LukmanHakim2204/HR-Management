<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPosting;


class Applicant extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applicants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_posting_id',
        'name',
        'slug',
        'email',
        'no_hp',
        'birthplace',
        'date_of_birth',
        'image',
        'resume',
        'marital_status',
        'last_education',
        'school_name',
        'university_name',
        'faculty',
        'program_study',
        'work_duration',
        'last_workplace',
        'reference_name',
        'reference_position',
        'reference_phone',
        'reference_company',
        'expected_salary',
    ];

    /**
     * Get the job postings associated with the applicant.
     */
    public function jobPostings()
    {
        return $this->belongsToMany(JobPosting::class, 'pivot_job_applicant', 'job_applicant_id', 'job_posting_id');
    }
}
