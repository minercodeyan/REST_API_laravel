<?php

namespace App\Http\Resources\ProductResources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductStandardResource extends JsonResource
{
    public $preserveKeys = true;

    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name' => $this->name,
            'measure'=>$this->measure,
            'barcode'=>$this->barcode,
            'sellingPrice'=>$this->selling_price,
            'groupId'=>$this->group_id
        ];
    }
}
