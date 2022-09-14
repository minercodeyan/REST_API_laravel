<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;


    public function definition()
    {
        return [
            'name' => fake()->name(),
            'measure' => fake()->numberBetween(10000,999999),
            'barcode'=> fake()->numberBetween(1000,4000),
            'selling_price'=> fake()->randomNumber(),
            'group_id'=> fake()->numberBetween(1,5),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
