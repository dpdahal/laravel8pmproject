<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_name',
        'color',
        'price',
        'sh',
        'image'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}