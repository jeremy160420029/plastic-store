<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubProcess extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function subcategories(){
        return $this->belongsToMany(SubCategory::class,"product_categories", "sub_processes_id", "sub_categories_id");
    }

    public function products(){
        return $this->hasMany(Product::class, "sub_processes_id", "id");
    }
}
