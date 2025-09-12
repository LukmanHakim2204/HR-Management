<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone' => $this->no_hp,
            'birthplace' => $this->birthplace,
            'date_of_birth' => $this->date_of_birth?->format('Y-m-d'),
            'image' => $this->image,
            'resume' => $this->resume,
            'marital_status' => $this->marital_status,

            // Grouping education fields
            'education' => [
                'last_education' => $this->last_education,
                'school_name' => $this->school_name,
                'university_name' => $this->university_name,
                'faculty' => $this->faculty,
                'program_study' => $this->program_study,
            ],

            // Grouping work experience
            'work_experience' => [
                'work_duration' => $this->work_duration,
                'last_workplace' => $this->last_workplace,
            ],

            // Grouping reference information
            'reference' => [
                'name' => $this->reference_name,
                'position' => $this->reference_position,
                'phone' => $this->reference_phone,
                'company' => $this->reference_company,
            ],

            'expected_salary' => $this->expected_salary,
        ];
    }
}
