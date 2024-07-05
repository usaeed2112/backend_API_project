<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        if (is_null($this->resource)) {
            return [];
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author()->select('id', 'name', 'description')->first(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
