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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title');
            $table->string('description');
            $table->string('project_type');
            $table->string('subject_area');
            $table->string('project_attachment_id');
            $table->string('deadline');
            $table->string('progress')->comment('1-action, 2-inprogress , 3-completed');
            $table->unsignedBigInteger('expert_id')->comment('0-no expert found');
            $table->foreign('expert_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('price');
            $table->string('expert_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
