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
        Schema::create('home_widgets', function (Blueprint $table) {
            $table->id();
            $table->string('short_1')->nullable();
            $table->string('short_2')->nullable();
            $table->string('short_3')->nullable();

            // Banner Images (4 sections)
            $table->string('banner_1')->nullable();
            $table->string('banner_2')->nullable();
            $table->string('banner_3')->nullable();
            $table->string('banner_4')->nullable();
            $table->string('banner_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_widgets');
    }
};
