<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rel_to_category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function rel_to_subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
}
