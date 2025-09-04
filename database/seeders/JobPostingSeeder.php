<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPosting::create([
            'images' => 'job1.png',
            'title' => 'Backend Developer',
            'category_id' => 1, // pastikan category sudah ada
            'company_id' => 1,  // pastikan company sudah ada
            'requirements' => 'Menguasai PHP, Laravel, MySQL',
            'benefits' => 'BPJS, Bonus, Remote work',
            'responsibility' => 'Membangun API, maintain sistem',
            'location' => 'Jakarta',
            'min_salary' => 8000000,
            'max_salary' => 12000000,
            'type' => 'fulltime',
            'status' => 'open',
        ]);

        JobPosting::create([
            'images' => 'job2.png',
            'title' => 'Frontend Developer',
            'category_id' => 1,
            'company_id' => 1,
            'requirements' => 'Menguasai React, Tailwind, REST API',
            'benefits' => 'Asuransi kesehatan, WFH 2x seminggu',
            'responsibility' => 'Develop UI/UX dan integrasi API',
            'location' => 'Bandung',
            'min_salary' => 7000000,
            'max_salary' => 10000000,
            'type' => 'contract',
            'status' => 'open',
        ]);
    }
}
