<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('product_quantity')
            ->using(OrderProduct::class)
            ->withTimestamps();
    }

    public function order($id){
        $client = Client::find($id);
        return($client);
    }
}
