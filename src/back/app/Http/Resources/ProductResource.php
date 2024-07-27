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
        parent::wrap(null); // for disable 'data' wrapper in response

        return [
            'id' => $this->id,
            'name' => $this->name,
            'count' => $this->count,
            'source' => $this->source,
            'laser' => $this->laser,
            'welding' => $this->welding,
            'assembling' => $this->assembling,
            'electro' => $this->electro,
            'children' => ProductResource::collection($this->childProducts)
        ];
    }
}
