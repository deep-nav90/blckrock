<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Order;
use App\Models\User;



class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_id',
        'transaction_id',
        'payment_type',
        'coupon_code',
        'coupon_amount_and_percentage',
        'coupon_type',
        'discount_amount_for_coupon',
        'shipping_charger',
        'total_amount',
        'pay_amount'
    ];

    public function user(){
        return $this->belongsTo(User::class)->with('userAddress');
    }

    public function order(){
        return $this->belongsTo(Order::class)->with('user','billingShippingAddress','productOrders','payment');
    }

}
