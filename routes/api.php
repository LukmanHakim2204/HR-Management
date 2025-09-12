<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\JobPostingController;
use App\Http\Controllers\Api\ApplicantController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ Job Postings
Route::get('/job-postings', [JobPostingController::class, 'index']);
Route::get('/job-postings/{jobPosting}', [JobPostingController::class, 'show']);
Route::post('/job-posting', [JobPostingController::class, 'store']);
Route::put('/job-posting/{jobPosting}', [JobPostingController::class, 'update']);

// ✅ Companies bisa diakses tanpa login
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{company}', [CompanyController::class, 'show']);

// ✅ Categories (public list)
Route::get('/categories', [CategoryController::class, 'index']);

// ✅ Group yang butuh login
Route::middleware(['auth:sanctum'])->group(function () {
    // Categories (create & update)
    Route::post('/category', [CategoryController::class, 'store']);
    Route::put('/category/{category}', [CategoryController::class, 'update']);

    // Companies (create, update, delete)
    Route::post('/company', [CompanyController::class, 'store']);
    Route::put('/company/{company}', [CompanyController::class, 'update']);
<<<<<<< HEAD

    Route::post('/job-posting', [JobPostingController::class, 'store']);
    Route::put('/job-posting/{jobPosting}', [JobPostingController::class, 'update']);
=======
    Route::delete('/company/{company}', [CompanyController::class, 'destroy']);

    // Applicants
    Route::post('applicants/{applicant}/apply', [ApplicantController::class, 'applyToJob']);
    Route::apiResource('applicants', ApplicantController::class);
>>>>>>> a780e39488186500c015d994887bf5cdf3b113fe
});

require __DIR__ . '/auth.php';
