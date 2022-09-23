<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{

    protected array $columns = [];

    public function attributesToArray(): array
    {
        $attributes = parent::attributesToArray();
        foreach ($this->columns as $convention => $actual) {
            if (array_key_exists($actual, $attributes)) {

                $attributes[$convention] = $attributes[$actual];
                if($actual!==$convention){
                    unset($attributes[$actual]);
                }
            }
        }
        return $attributes;
    }

    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->columns)) {
            $key = $this->columns[$key];
        }
        return parent::getAttributeValue($key);
    }

    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, $this->columns)) {
            $key = $this->columns[$key];
        }
        return parent::setAttribute($key, $value);
    }


}
