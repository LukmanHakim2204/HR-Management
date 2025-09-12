<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CompanyResource;

class CompanyController extends Controller
{
    public function index()
    {
        // Fetch all companies
        $companies = Company::get();
        return CompanyResource::collection($companies);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $company = Company::create($validated);
        return new CompanyResource($company);
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $company->update($validated);
        return new CompanyResource($company);
    }

    // ✅ Opsional: Tambahkan function destroy jika diperlukan
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully'
        ]);
    }
}
