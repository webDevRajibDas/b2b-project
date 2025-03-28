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
        Schema::create('vendor_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('selling_product_type');
            $table->string('product_type')->nullable();
            $table->string('month_order')->nullable();
            $table->json('target_customers')->nullable();

            $table->string('minimum_order_qty');
            $table->string('site_link')->nullable();
            $table->string('factory_address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('whats_up');
            $table->string('wholesale_confirmation')->nullable();
            $table->string('trade_licence')->nullable();
            $table->string('status')->default('unread'); // e.g., 1=read, 2=unread
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_contacts');
    }
};
