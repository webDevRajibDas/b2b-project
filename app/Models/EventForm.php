<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    protected $fillable = [
        'name', 'father_name', 'mother_name', 'pass_year',
        'address', 'present_address', 'mobile', 'whats_up',
        'r_fee', 'r_fee_type', 'transaction_id'
    ];

}
