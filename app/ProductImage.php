<?php

namespace TaruCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['extension', 'product_id'];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
