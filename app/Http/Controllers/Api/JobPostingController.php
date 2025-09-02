<?php

namespace App\Http\Controllers\Api;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\JobPostingResource;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::with(['company', 'category'])->get();
        return JobPostingResource::collection($jobPostings);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'responsibility' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'status' => 'required|in:open,closed',
        ]);

        $jobPosting = JobPosting::create($validated);
        return new JobPostingResource($jobPosting->load(['company', 'category']));
    }

    public function update(Request $request, JobPosting $jobPosting)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'company_id' => 'sometimes|required|exists:companies,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'responsibility' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'type' => 'sometimes|required|in:full-time,part-time,contract,internship',
            'status' => 'sometimes|required|in:open,closed',
        ]);

        $jobPosting->update($validated);
        return new JobPostingResource($jobPosting->load(['company', 'category']));
    }
}
