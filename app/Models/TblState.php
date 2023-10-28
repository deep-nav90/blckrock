<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TblCity;
class TblState extends Model
{
    use HasFactory;

    public function tblCities(){
        return $this->hasMany(TblCity::class,'state_id','id');
    }
}
