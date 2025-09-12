<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'slug'            => $this->slug,
            'email'           => $this->email,
            'no_hp'           => $this->no_hp,
            'birthplace'      => $this->birthplace,
            'date_of_birth'   => $this->date_of_birth,
            'image_url'       => $this->image ? asset('storage/' . $this->image) : null,
            'resume_url'      => $this->resume ? asset('storage/' . $this->resume) : null,
            'marital_status'  => $this->marital_status,
            'expected_salary' => $this->expected_salary,
            // 'jobs' => JobPostingResource::collection($this->whenLoaded('jobPostings')),

            'created_at'      => $this->created_at?->toDateTimeString(),
            'updated_at'      => $this->updated_at?->toDateTimeString(),
        ];
    }
}
