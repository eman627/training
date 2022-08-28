<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_id'=>$this->id,
            'product_name'=>$this->name,
            'product_description'=>$this->description,
            'product_image'=>$this->image,
            'category'=>$this->category->category,
            'price'=>$this->price,
        ];
    }
}
