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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Image path
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('video_link')->nullable(); // External video URL
            $table->string('video_path')->nullable(); // Uploaded video file
            $table->boolean('status')->default(1); // Active or Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
