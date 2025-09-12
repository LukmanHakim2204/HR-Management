<?php

namespace App\Http\Controllers\Api;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Api\JobPostingResource;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::with(['company', 'category'])->get();
        return JobPostingResource::collection($jobPostings);
    }
public function show(JobPosting $jobPosting)
    {
        return new JobPostingResource($jobPosting->load(['company', 'category']));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([

            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('jobposting', 'public');
            $validated['images'] = $path;
        }

        $jobPosting = JobPosting::create($validated);
        return new JobPostingResource($jobPosting->load(['company', 'category']));
    }

    public function update(Request $request, JobPosting $jobPosting)
    {
        $validated = $request->validate([
            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
        if ($request->hasFile('images')) {
            if ($jobPosting->images && Storage::disk('public')->exists($jobPosting->images)) {
                Storage::disk('public')->delete($jobPosting->images);
            }
            $path = $request->file('images')->store('jobposting', 'public');
            $validated['images'] = $path;
        }

        $jobPosting->update($validated);
        return new JobPostingResource($jobPosting->load(['company', 'category']));
    }
}
