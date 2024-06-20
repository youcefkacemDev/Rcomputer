<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'quantity',
        'image',
        'sku',
        'admin_id',
        'category_id',
        'brand_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getBrand($id)
    {
        $brand = Brand::find($id);
        return $brand["name"];
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        return $category['name'];
    }


    public function productNumbers($id)
    {
        $productNumbers = Product::find($id);
        dd($productNumbers);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('product_quantity')
            ->using(OrderProduct::class)
            ->withTimestamps();
    }
}
