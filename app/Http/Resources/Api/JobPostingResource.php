<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobPostingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'company' => new CompanyResource($this->whenLoaded('company')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'requirements' => $this->requirements,
            'benefits' => $this->benefits,
            'responsibility' => $this->responsibility,
            'location' => $this->location,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'type' => $this->type,
            'status' => $this->status

        ];
    }
}
