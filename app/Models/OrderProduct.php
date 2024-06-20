<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity',
    ];

    public function getProduct($id){
        $product = Product::find($id);
        return($product);
    }

    public function getProductImage($id){
        $product = Product::find($id);
        return('storage/' . $product['image']);
    }

}
