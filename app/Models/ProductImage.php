<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'product_image',
        'is_featured_image',
        'deleted_at'
    ];

    public function getProductImageAttribute($value){
        if(!empty($value)){

            $path_of_file = storage_path("/app/public/product_images") . "/" . $value;
            if(file_exists($path_of_file)){
                return url("/public/storage/product_images") . "/" . $value;
            }else{
                return url("/public/dummy.jpg");
            }
        }else{
            return url("/public/dummy.jpg");
        }
        
    }
}
