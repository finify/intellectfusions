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
        Schema::create('expertdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('balance')->nullable();
            $table->string('profileimage')->nullable();
            $table->text('about')->nullable();
            $table->string('phone_number')->nullable();
            $table->json('field_of_study')->nullable();
            $table->json('project_type')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('degree_obtained')->nullable();
            $table->string('degree_obtained_others')->nullable();
            $table->string('availability')->nullable();
            $table->string('deliver')->nullable();
            $table->text('plagiarism')->nullable();
            $table->text('plagiarismcheck')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expertdetails');
    }
};
