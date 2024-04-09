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
        Schema::create('expert_detail', function (Blueprint $table) {
            $table->id();
            $table->string('expert_id');
            $table->string('about');
            $table->string('phone_number');
            $table->string('field_of_study');
            $table->string('project_type');
            $table->string('subject_area');
            $table->string('subject_area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_detail');
    }
};
