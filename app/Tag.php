<?php

namespace TaruCommerce;

use Illuminate\Database\Eloquent\Model;
use TaruCommerce\Product;

class Tag extends Model
{

	protected $table = 'tags';
    protected $fillable = ['name'];

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'product_tags', 'tag_id', 'product_id');
    }

    public function scopeSetTags($query, $input, $product_id)
    {
        $tags = explode(",", $input);
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag = $this->firstOrCreate(array("name" => $tag));
            $tag->products()->attach($product_id);
        }
    }

    public function scopeUpdateTags($query, $input, Product $product)
    {
        $tags = explode(",", $input);
        $ids = [];
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag = $this->firstOrCreate(array("name" => $tag));
            $ids[] = $tag->id; 
        }
        $product->tags()->sync($ids);
    }
}
