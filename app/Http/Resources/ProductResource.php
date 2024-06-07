<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->whenNotNull($this->name),
            'code'=>$this->whenNotNull($this->code),
            'price'=>$this->whenNotNull($this->price),
            'qty'=>$this->whenNotNull($this->qty),
            'isActive'=>$this->isActive,
            'stocks'=>ProductResource::collection($this->whenLoaded('stocks'))
        ];
    }
}
