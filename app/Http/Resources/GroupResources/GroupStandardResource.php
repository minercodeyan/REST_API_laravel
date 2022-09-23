<?php

namespace App\Http\Resources\GroupResources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupStandardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'code'=>$this->code,

        ];
    }
}
