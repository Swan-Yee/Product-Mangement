<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'sub_category_name',
        'image',
        'category_id'
    ];

    public function Product(){
        return $this->belongsToMany(Product::class,'Prouduct_SubCategory');
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
