<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Payment;
use App\Models\ProductOrder;
use App\Models\BillingShippingAddress;
use App\Models\User;


class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unique_order_id',
        'user_id',
        'payment_id',
        'coupon_code',
        'coupon_amount_and_percentage',
        'coupon_type',
        'discount_amount_for_coupon',
        'shipping_charger',
        'total_amount',
        'order_status',
        'payment_type',
        'pay_amount',
        'payment_received'
    ];

    public function payment(){
    	return $this->belongsTo(Payment::class);
    }

    public function productOrders(){
    	return $this->hasMany(ProductOrder::class);
    }

    public function BillingShippingAddress(){
    	return $this->hasOne(BillingShippingAddress::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->with('userAddress');
    }

}
