<?php

namespace Database\Seeders;


use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Student::factory(30)->create();
    }
}
