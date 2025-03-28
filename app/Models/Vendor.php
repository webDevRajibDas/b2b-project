<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'vendor_id',
        'description',
        'contact_person',
        'phone',
        'email',
        'website_link',
        'page_link',
        'address',
        'business_type',
        'business_registration_number',
        'payment_terms',
        'status',
        'date_added',
        'date_modified',
        'references',
        'file_path',
        'join_date',
        'vendor_category_id',
        'sub_categories_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestVendor = static::latest()->first();
            $nextId = $latestVendor ? (int) explode('-', $latestVendor->vendor_id)[1] + 1 : 1;
            $model->vendor_id = 'VEN-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });
    }


    public function category()
    {
        return $this->belongsTo(VendorCategorie::class, 'vendor_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategorie::class, 'sub_categories_id');
    }
}
