<?php

namespace App\Http\Resources\Diary;

use Illuminate\Http\Resources\Json\JsonResource;

class DiaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'=>$this->title,
            'image' => $this->image,
            'details' => $this->details,
        ];
    }
}
