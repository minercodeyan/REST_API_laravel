<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends AbstractModel
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;

    protected array $columns =[
        'name' => 'name',
        'measure'=>'measure',
        'barcode'=>'barcode',
        'sellingPrice'=>'selling_price',
        'groupId'=>'group_id'
    ];


    protected $fillable = [
        'name',
        'measure',
        'barcode',
        'selling_price'
    ];
}
