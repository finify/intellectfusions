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
            $table->string('user_id');
            $table->string('about')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('project_type')->nullable();
            $table->string('balance')->nullable();
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
