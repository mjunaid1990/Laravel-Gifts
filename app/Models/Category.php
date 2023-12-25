<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['shop_id', 'name', 'path', 'country', 'parent_category_id', 'is_header', 'is_home', 'orderno', 'slug', 'is_show_menu'];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function productHome(){
        if(isset($_GET['q']) && !empty($_GET['q'])){
            return $this->hasMany(Product::class)->where('title', 'like', "%{$_GET['q']}%")->orderBy('orderno', 'asc')->limit(12);
        }else {
            return $this->hasMany(Product::class)->orderBy('orderno', 'asc')->limit(12);
        }
        
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
    
    public function catLocation($category) {
        if($category->is_home == 1) {
            return 'Homepage';
        }
        if($category->is_header == 1 && $category->parent_category_id == null) {
            return 'Top Menu';
        }
        if($category->is_header == 1 && $category->parent_category_id != null) {
            return 'Child Menu';
        }
    }

    
}
