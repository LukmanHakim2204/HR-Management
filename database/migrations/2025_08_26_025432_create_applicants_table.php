<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('birthplace');
            $table->date('date_of_birth');
            $table->string('image');
            $table->string('resume');
            $table->enum('marital_status', ['single', 'married', 'divorced']);
            $table->string('last_education')->nullable();
            $table->string('school_name')->nullable();
            $table->string('university_name')->nullable();
            $table->string('faculty')->nullable();
            $table->string('program_study')->nullable();
            $table->string('work_duration')->nullable();
            $table->string('last_workplace')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('reference_position')->nullable();
            $table->string('reference_phone')->nullable();
            $table->string('reference_company')->nullable();
            $table->bigInteger('expected_salary')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
