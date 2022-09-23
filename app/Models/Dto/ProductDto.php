<?php

namespace App\Models\Dto;

class ProductDto
{
  private $name;
  private $measure;
  private $barcode;
  private $selling_price;
  private $group_id;

    /**
     * @param $name
     * @param $measure
     * @param $barcode
     * @param $selling_price
     * @param $group_id
     */
    public function __construct($product, $groupId)
    {
        $this->name = $product->name;
        $this->measure = $product->measure;
        $this->barcode = $product->barcode;
        $this->selling_price = $product->sellingPrice;
        $this->group_id = $groupId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @return mixed
     */
    public function getSellingPrice()
    {
        return $this->selling_price;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'measure'=>$this->measure,
            'barcode'=>$this->barcode,
            'selling_price'=>$this->selling_price,
            'group_id'=>$this->group_id,
        ];
    }


}
