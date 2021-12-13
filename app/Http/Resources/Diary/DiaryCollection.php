<?php

namespace App\Http\Resources\Diary;

use Illuminate\Http\Resources\Json\JsonResource;

class DiaryCollection extends JsonResource
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
            'name'=>$this->name,
            'image'=>$this->image,
            'details'=>$this->details,
            'href'=>[
                'single'=>route('diary.show',$this->id),
            ]
        ];
        // return parent::toArray($request);
    }
}
