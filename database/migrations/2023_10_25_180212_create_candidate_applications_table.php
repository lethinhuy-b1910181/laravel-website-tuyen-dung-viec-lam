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
        Schema::create('candidate_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->integer('job_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('letter')->nullable();
            $table->text('file');
            $table->integer('status');
            $table->tinyInteger('is_seen')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_applications');
    }
};
