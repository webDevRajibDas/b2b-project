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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id')->unique(); // Custom Vendor ID
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('website_link')->nullable();
            $table->string('page_link')->nullable();
            $table->text('address')->nullable();

            // Business Information
            $table->string('business_type');
            $table->string('business_registration_number')->unique();
            $table->string('payment_terms')->nullable();

            // Status
            $table->string('status')->default('active'); // e.g., active=1, inactive=0, pending=2
            $table->date('join_date')->nullable();
            $table->date('modified')->nullable();

            $table->text('references')->nullable();
            $table->string('file_path')->nullable(); // Store file path
            $table->foreignId('vendor_category_id')
                ->constrained('vendor_categories')
                ->onDelete('cascade'); // Optional: Add cascade on delete
            $table->foreignId('sub_categories_id')
                ->constrained('sub_categories')
                ->onDelete('cascade'); // Optional: Add cascade on delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
