<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productsNumber($categoryId){
        $productsNU = Product::all();
        $productsNU = $productsNU->where('category_id', '=', $categoryId);
        return ($productsNU);
    }
}
