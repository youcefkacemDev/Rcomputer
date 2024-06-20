<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

    public function productsNumber($brandId){
        $productsNUmber = Product::all();
        $productsNUmber = $productsNUmber->where('brand_id', '=', $brandId);
        return ($productsNUmber);
    }

}
