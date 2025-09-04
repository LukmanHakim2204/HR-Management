<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
Company::create([
    'slug' => 'pt-maju-jaya',
    'name' => 'PT Maju Jaya',
    'description' => 'Perusahaan bergerak di bidang IT'
]);


Company::create([
    'slug' => 'pt-sejahtera-abadi',
    'name' => 'PT Sejahtera Abadi',
    'description' => 'Perusahaan manufaktur dan distribusi'
]);    }
}
