<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'type' => 'products',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'price' => (string) $this->price,
                'discount' => (string) $this->discount,
                'quantity' => (string) $this->quantity,
                'image' => asset('storage/' . $this->image),
                'sku' => $this->sku,
                'category_id' => (String) $this->category_id,
                'brand_id' => (String) $this->brand_id,
            ]
        ];
    }
}
