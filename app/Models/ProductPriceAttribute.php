<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Attribute;
use App\Models\Product;

class ProductPriceAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'product_id',
    	'attribute_id',
    	'product_price',
    	'sale_price',
    	'attribute_value',
    	'is_default_show'
    ];

    public function attribute(){
    	return $this->belongsTo(Attribute::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
