<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id','sub_category_name','meta_keyword','meta_description','sub_category_image','status'];


    public function getSubCategoryImageAttribute($value){
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
}
