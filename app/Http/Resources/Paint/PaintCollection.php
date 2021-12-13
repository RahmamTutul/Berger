<?php

namespace App\Http\Resources\Paint;

use Illuminate\Http\Resources\Json\JsonResource;

class PaintCollection extends JsonResource
{
    
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->title,
            'image'=>$this->image,
            'href'=>[
                'paint'=> route('paint.show',$this->id),
            ]
        ];
        // return parent::toArray($request);
    }
}
