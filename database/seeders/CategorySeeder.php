<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->has(Produit::factory(2))->create();
    }
}
