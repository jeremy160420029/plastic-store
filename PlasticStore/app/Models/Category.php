<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, "categories_id", "id");
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
