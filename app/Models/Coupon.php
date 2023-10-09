<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'coupon_name',
        'coupon_type',
        'coupon_amount_and_percentage',
        'from_date',
        'to_date',
        'coupon_code',
        'meta_keyword',
        'meta_description'
    ];
}
