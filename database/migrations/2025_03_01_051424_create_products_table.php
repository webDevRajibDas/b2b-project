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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // VARCHAR(191)
            $table->text('description')->nullable(); // TEXT, nullable
            $table->longText('content')->nullable(); // LONGTEXT, nullable
            $table->string('status')->default('published'); // VARCHAR(60), default 'published'
            $table->string('image')->nullable(); // VARCHAR(191), nullable
            $table->text('video_media')->nullable(); // TEXT, nullable
            $table->string('sku')->nullable(); // VARCHAR(191), nullable
            $table->unsignedInteger('order')->default(0); // INT UNSIGNED, default 0
            $table->unsignedInteger('quantity')->nullable(); // INT UNSIGNED, nullable
            $table->unsignedTinyInteger('allow_checkout_when_out_of_stock')->default(0); // TINYINT UNSIGNED, default 0
            $table->unsignedTinyInteger('with_storehouse_management')->default(0); // TINYINT UNSIGNED, default 0
            $table->unsignedTinyInteger('is_featured')->default(0); // TINYINT UNSIGNED, default 0
            $table->unsignedBigInteger('brand_id')->nullable(); // BIGINT UNSIGNED, nullable
            $table->tinyInteger('is_variation')->default(0); // TINYINT, default 0
            $table->tinyInteger('sale_type')->default(0); // TINYINT, default 0
            $table->double('price', 8, 2)->unsigned();
            $table->double('sale_price', 8, 2)->unsigned();
            $table->timestamp('start_date')->nullable(); // TIMESTAMP, nullable
            $table->timestamp('end_date')->nullable(); // TIMESTAMP, nullable
            $table->double('length', 8, 2)->nullable(); // DOUBLE(8,2), nullable
            $table->double('wide', 8, 2)->nullable(); // DOUBLE(8,2), nullable
            $table->double('height', 8, 2)->nullable(); // DOUBLE(8,2), nullable
            $table->double('weight', 8, 2)->nullable(); // DOUBLE(8,2), nullable
            $table->text('color')->nullable(); // TEXT, nullable
            $table->text('fabric')->nullable(); // TEXT, nullable
            $table->unsignedBigInteger('tax_id')->nullable(); // BIGINT UNSIGNED, nullable
            $table->bigInteger('views')->default(0); // BIGINT, default 0

            $table->string('stock_status')->default('in_stock'); // VARCHAR(191), default 'in_stock'
            $table->unsignedBigInteger('vendor_id')->nullable(); // BIGINT UNSIGNED, nullable
            $table->unsignedBigInteger('created_by_id')->default(0); // BIGINT UNSIGNED, default 0
            $table->string('created_by')->nullable('slider');
            $table->unsignedBigInteger('approved_by')->default(0); // BIGINT UNSIGNED, default 0
            $table->string('product_type')->default('physical'); // VARCHAR(60), default 'physical'
            $table->string('barcode', 50)->nullable(); // VARCHAR(50), nullable
            $table->double('cost_per_item')->nullable(); // DOUBLE, nullable
            $table->unsignedInteger('minimum_order_quantity')->default(0); // INT UNSIGNED, default 0
            $table->unsignedInteger('maximum_order_quantity')->default(0); // INT UNSIGNED, default 0
            $table->boolean('notify_attachment_updated')->default(false); // TINYINT(1), default 0
            $table->timestamps(); // `created_at` and `updated_at` TIMESTAMP
            $table->softDeletes(); // `created_at` and `updated_at` TIMESTAMP

            // Indexes
            $table->index(['brand_id', 'status', 'is_variation', 'created_at'], 'products_brand_id_status_is_variation_created_at_index');
            $table->index('sale_type', 'sale_type_index');
            $table->index('start_date', 'start_date_index');
            $table->index('end_date', 'end_date_index');
            $table->index('sale_price', 'sale_price_index');
            $table->index('is_variation', 'is_variation_index');
            $table->index('sku', 'products_sku_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
