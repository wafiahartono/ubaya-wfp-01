<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($j = 0; $j < 10; $j++) {
            Category::factory()->hasProducts(rand(3, 5))->create();
        }
    }
}
