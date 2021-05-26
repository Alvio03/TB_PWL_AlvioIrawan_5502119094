<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function kategori(){
        return $this->belongsTo('App\Models\Categories','categories_id','id');
    }
    public function merek(){
        return $this->belongsTo('App\Models\Brands','brands_id','id');
    }
}
