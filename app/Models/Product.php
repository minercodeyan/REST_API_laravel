<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;

    protected array $maps=[
        'id'=>'id',
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
        'selling_price',
        'group_id'
    ];
}
