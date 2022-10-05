<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categoryfuncP(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function subcategoryfuncP(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }
    public function brandfuncP(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
}
