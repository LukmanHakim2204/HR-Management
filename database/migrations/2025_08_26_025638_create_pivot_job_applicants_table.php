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
        Schema::create('pivot_job_applicant', function (Blueprint $table) {
            $table->id(); // Sesuai dengan gambar
            $table->bigInteger('job_posting_id');
            $table->bigInteger('job_applicant_id');

            // Opsional: Menambahkan foreign key constraints untuk memastikan integritas data
            $table->foreign('job_posting_id')->references('id')->on('job_postings')->onDelete('cascade');
            $table->foreign('job_applicant_id')->references('id')->on('applicants')->onDelete('cascade');

            // Opsional: Menambahkan unique constraint untuk mencegah duplikasi entri
            $table->unique(['job_posting_id', 'job_applicant_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_job_applicant');
    }
};
