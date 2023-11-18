<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductPriceAttribute;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'product_name',
        'status',
        'meta_keyword',
        'meta_description',
        'product_description',
        'product_quantity',
        'average_rating',
        'deleted_at',
    ];

    public function productImages(){
        return $this->hasMany(ProductImage::class)->whereDeletedAt(null);
    }

    public function category(){
        return $this->belongsTo(Category::class)->with('subCategories');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function productPriceAttributes(){
        return $this->hasMany(ProductPriceAttribute::class)->whereDeletedAt(null)->with('attribute','product');
    }
}
