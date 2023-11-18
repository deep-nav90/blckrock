<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'payment_id',
        'product_price',
        'sale_price',
        'quantity',
        'category_name',
        'sub_category_name',
        'product_name',
        'product_description',
        'calculated_amount',
        'attribute_name',
        'attribute_value'
    ];

    public function product(){
        return $this->belongsTo(Product::class)->with('productImages');
    }

}
