<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BillingShippingAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_id',
        'order_id',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone_number',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zip_code',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone_number',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip_code',
    ];
}
