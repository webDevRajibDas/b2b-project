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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->nullable()->constrained('user')->onDelete('set null'); // Assuming 'user' table exists
            $table->string('sessionId', 100)->nullable(false); // COLLATE utf8mb4_unicode_ci is often default
            $table->string('token', 100)->nullable(false);
            $table->tinyInteger('status')->default('0'); // smallint(6) is often represented by tinyInteger or smallInteger in Laravel
            $table->float('subTotal', 10, 2)->default(0); // Specify precision and scale for float if needed
            $table->float('itemDiscount', 10, 2)->default(0);
            $table->float('tax', 10, 2)->default(0);
            $table->float('shipping', 10, 2)->default(0);
            $table->float('total', 10, 2)->default(0);
            $table->string('promo', 50)->nullable();
            $table->float('discount', 10, 2)->default(0);
            $table->float('grandTotal', 10, 2)->default(0);

            // Address fields
            $table->string('fullName', 50)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('line1', 50)->nullable();
            $table->string('line2', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('country', 50)->nullable();

            $table->text('content')->nullable(); // Assuming content can be null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
