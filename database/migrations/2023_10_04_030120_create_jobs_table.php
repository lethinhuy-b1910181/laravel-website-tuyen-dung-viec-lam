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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->text('title');
            $table->text('description');
            $table->text('attachments')->nullable();
            $table->text('skill')->nullable();
            $table->text('benefit')->nullable();
            $table->datetime('deadline');
            $table->integer('vacancy');
            $table->integer('job_category_id');
            $table->integer('job_location_id');
            $table->integer('job_type_id');
            $table->integer('job_experience_id');
            $table->integer('job_gender_id');
            $table->integer('job_salary_id');
            $table->integer('job_nature_id');
            $table->integer('job_level_id');
            $table->integer('quantity')->default(0);
            $table->tinyInteger('quantity')->default(1)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
