<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubCategory;
use App\Models\Product;
use DB;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_name','meta_keyword','meta_description','category_image','status'];

    public function subCategories(){
        return $this->hasMany(SubCategory::class)->whereStatus('Active');
    }


    public function getCategoryImageAttribute($value){
        if(!empty($value)){

            $path_of_file = storage_path("/app/public/category_images") . "/" . $value;
            if(file_exists($path_of_file)){
                return url("/public/storage/category_images") . "/" . $value;
            }else{
                return url("/public/dummy.jpg");
            }
        }else{
            return url("/public/dummy.jpg");
        }
        
    }

    public function topThreeProducts(){
        return $this->hasMany(Product::class)->select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->where(DB::raw('(SELECT status FROM categories WHERE categories.id = products.category_id)'), '=', 'Active')->with('productImages','subCategory','productPriceAttributes')->orderBy('average_rating','desc')->limit(9);
    }

    public function allProductsMatchCategoryId(){
        return $this->hasMany(Product::class)->select("*", DB::raw('(SELECT attribute_name FROM attributes WHERE attributes.id = (SELECT attribute_id FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND is_default_show = 1 AND product_price_attributes.deleted_at IS NULL)) AS default_attribute_name'), DB::raw('(SELECT product_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_product_price'), DB::raw('(SELECT sale_price FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_sale_price'), DB::raw('(SELECT attribute_value FROM product_price_attributes WHERE product_price_attributes.product_id = products.id AND product_price_attributes.is_default_show = 1) AS default_attribute_value'),DB::raw('(SELECT category_name FROM categories WHERE categories.id = products.category_id) AS cat_name'),DB::raw('(SELECT sub_category_name FROM sub_categories WHERE sub_categories.id = products.sub_category_id) AS sub_cat_name'))->where(DB::raw('(SELECT status FROM sub_categories WHERE sub_categories.id = products.sub_category_id)'), '=', 'Active')->with('productImages','subCategory');
    }


}
