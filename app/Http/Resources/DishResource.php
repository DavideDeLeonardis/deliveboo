<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
            'image' => $this->image,
            'price' => $this->price,
            'availability' => $this->availiability,
            'course' => $this->course,
        ];
    }
}
