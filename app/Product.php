<?php

namespace TaruCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'featured', 'recommended', 'category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1)->get();
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommended', '=', 1)->get();
    }

}
