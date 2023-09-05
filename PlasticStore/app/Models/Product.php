<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        #1 category
        return $this->belongsTo(Category::class, "categories_id");
    }

    public function subCategory(){
        #1 sub category
        return $this->belongsTo(SubCategory::class, "sub_categories_id");
    }

    public function subProcess(){
        #1 sub proses
        return $this->belongsTo(SubProcess::class, "sub_processes_id");
    }

    public function brand(){
        return $this->belongsTo(Brand::class, "brands_id");
    }
}
