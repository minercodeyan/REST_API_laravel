<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Product::factory(30)->create();
    }
}
