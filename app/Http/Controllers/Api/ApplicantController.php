<?php

namespace App\Http\Controllers\Api;

use Storage;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ApplicantResource;
use App\Http\Resources\Api\ApplicantCollection;

class ApplicantController extends Controller
{
    // public function index()
    // {
    //     $applicants = Applicant::paginate(15);
    //     return new ApplicantCollection($applicants);
    // }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|unique:applicants', // optional, karena ada mutator
        'email' => 'required|email|unique:applicants',
        'no_hp' => 'required|string',
        'birthplace' => 'required|string',
        'date_of_birth' => 'required|date',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'resume' => 'required|mimes:pdf,doc,docx|max:5120',
        'marital_status' => 'required|in:single,married,divorced',
        'expected_salary' => 'nullable|integer',
        'job_ids' => 'required|array',
        'job_ids.*' => 'exists:job_postings,id'
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('applicants/images', 'public');
    }

    if ($request->hasFile('resume')) {
        $validated['resume'] = $request->file('resume')->store('applicants/resumes', 'public');
    }

    $applicant = Applicant::create($validated);

    $applicant->jobPostings()->attach($validated['job_ids']);

    return new ApplicantResource($applicant->load('jobPostings'));
}



    public function show(Applicant $applicant)
    {
        return new ApplicantResource($applicant);
    }

    public function update(Request $request, Applicant $applicant)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:applicants,email,' . $applicant->id,
            'slug' => 'sometimes|string|unique:applicants,slug,' . $applicant->id,
            'marital_status' => 'sometimes|in:single,married,divorced',
            // tambahkan field lainnya
        ]);

        $applicant->update($validated);
        return new ApplicantResource($applicant);
    }

    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
