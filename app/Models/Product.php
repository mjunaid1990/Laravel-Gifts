<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['category_id', 'title', 'desc', 'price', 'stock', 'country', 'desc2', 'redeem_desc', 'terms', 'faqs', 'is_dropdown', 'is_homepage', 'orderno', 'slug'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productSingleImage(){
        return $this->hasOne(ProductImage::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }
    
    public function productImageUrl(){
        return $this->hasMany(ProductImage::class);
    }
    
    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 2;

        // Check for uniqueness and add a number suffix if needed
        while ($this->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $this->attributes['slug'] = $slug;
    }

    
}
