<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorContact extends Model
{
    protected $fillable = [
        'selling_product_type', 'product_type', 'month_order', 'target_customers',
        'minimum_order_qty', 'site_link', 'factory_address', 'email', 'mobile',
        'whats_up', 'wholesale_confirmation', 'trade_licence', 'status',
    ];

    protected $casts = [
        'target_customers' => 'array',
    ];
}
