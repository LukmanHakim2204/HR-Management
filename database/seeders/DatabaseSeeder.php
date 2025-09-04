<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\JobPostingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    $this->call([
        UserSeeder::class,
        CategorySeeder::class,
        CompanySeeder::class,
        JobPostingSeeder::class,
    ]);
}


}
