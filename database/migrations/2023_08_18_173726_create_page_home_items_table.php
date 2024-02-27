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
        Schema::create('page_home_items', function (Blueprint $table) {
            $table->id();
            $table->text('heading');
            $table->text('text')->nullable();
            $table->text('job_title');
            $table->text('job_location');
            $table->text('job_category');
            $table->text('job_search');
            $table->text('background');
            $table->text('job_category_heading');
            $table->text('job_category_subheading')->nullable();
            $table->text('job_category_status');
            $table->text('why_choose_heading');
            $table->text('why_choose_subheading')->nullable();
            $table->text('why_choose_background');
            $table->text('why_choose_status');
            $table->text('feature_job_heading');
            $table->text('feature_job_subheading')->nullable();
            $table->text('feature_job_status');
            $table->text('blog_heading');
            $table->text('blog_subheading')->nullable();
            $table->text('blog_status');
            $table->text('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_home_items');
    }
};
