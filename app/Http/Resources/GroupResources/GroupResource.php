<?php

namespace App\Http\Resources\GroupResources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'code'=>$this->code,
            ];
    }

}
